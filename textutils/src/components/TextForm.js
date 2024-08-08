import React, {useState} from "react";

export default function TextForm(props) {
  document.title = "TextEdits - Home";

 
  const [text, setText] = useState("");

  const handleupclick = ()=>{
    let newText = text.toUpperCase();
    setText(newText);
    props.showAlert("Converted to UPPERCASE", "success");
  }

  const handlelowclick = ()=>{
    let newText = text.toLowerCase();
    setText(newText);
    props.showAlert("Converted to lowercase ", "success");
  }

  const handleclearclick = ()=>{
    setText("");
    props.showAlert("cleared text", "success");
  }

  const handleonchange = (e)=>{
    console.log("on change");
    setText(e.target.value);
  }

  const handleremovespace = (e)=>{
    let newText = text.split(/[ ]+/);
    setText(newText.join(" "));
    props.showAlert("Removed extra spaces", "success");
  }

  const handlecopyclick = (e)=>{
    navigator.clipboard.writeText(text);
    document.getSelection().removeAllRanges();
    props.showAlert("Copied to clipboard", "success");
  }

  const handleprint = (e)=>{
    const content = document.getElementById("mybox").value;
    const printwindow =  window.open('','_blank', 'width = 1000, height=600');
    printwindow.document.write(`
        <html>
        <head>
        <title> print </title>
        <style>
        body{
          font-family: 'Poppins', 'Times New Roman', Times, serif;
          margin: 20px;
          border: 1px solid black;
          border-radious: 10px;
          padding: 35px;
        }
          pre{
            white-space: pre-wrap;
            word-wrap: break-word;
          }
        </style>
        </head>
        <body>

          <pre> ${content}</pre>

        </body>
        </html>
      `);
      printwindow.document.close();
      printwindow.focus();
      printwindow.print();
      printwindow.close();
    }
    const mystyle2 = {
      paddingTop : "0"
    };
    const [selectedFile, setSelectedFile] = useState(null);
    function handlefilechange(e){
      const file = e.target.files[0];
      setSelectedFile(file);
      const fileType = file.type;
      if(fileType === 'text/plain'){
        const reader = new FileReader();
        reader.onload = (e)=>{
          setText(e.target.result);
        };
        reader.readAsText(file);
      }else{
        
      }
    }
  
  return (
    
    <>
    <div className="my-35" style={mystyle2}>
      <h1 >{props.heading}</h1>
      <div className="mb-3">
        <label htmlFor="mybox" className="form-label">
          {props.title}
        </label>
        <textarea
          className="form-control"
          id="mybox"
          rows="8"
          value={text}
          onChange={handleonchange}
        ></textarea>
      </div>
      <button disabled={text.split(" ").filter((element)=>{return element.length !== 0}).length === 0} className="btn bg-primary mx-2 my-2 text-light" onClick={handleupclick}>UPPERCASE</button>
      <button disabled={text.split(" ").filter((element)=>{return element.length !== 0}).length === 0} className="btn bg-primary mx-2 my-2 text-light" onClick={handlelowclick}>lowercase</button>
      <button disabled={text.split(" ").filter((element)=>{return element.length !== 0}).length === 0} className="btn bg-danger mx-2 my-2 text-light" onClick={handleclearclick}>Clear</button>
      <button disabled={text.split(" ").filter((element)=>{return element.length !== 0}).length === 0} className="btn bg-primary mx-2 my-2 text-light" onClick={handlecopyclick}>Copy</button>
      <button disabled={text.split(" ").filter((element)=>{return element.length !== 0}).length === 0} className="btn bg-primary mx-2 my-2 text-light" onClick={handleremovespace}>Remove Extra Spaces</button>
      <button disabled={text.split(" ").filter((element)=>{return element.length !== 0}).length === 0} className="btn bg-primary mx-2 my-2 text-light" onClick={handleprint}>Save</button>
      <input className="btn btn-secondary" type="file" onChange={handlefilechange} />
      <p>Selected File:{selectedFile != null ? selectedFile.name:"No file selected"}</p>
    </div>
    <div className="container my-4">
      <h1 className="text-info">Your Text Summary</h1>
      <p>{text.split(/\s+/).filter((element)=>{return element.length !== 0}).length} Words and {text.length} Character.</p>
      <p>{0.008* text.split(" ").filter((element)=>{return element.length !== 0}).length} min. reads</p>
      <h1 className="text-info">Preview</h1>
      <p>{text.length > 0 ? text :"Nothing to Preview"}</p>
    </div>
    </>
    
  );
}
