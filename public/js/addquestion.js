(()=>{
    const questionsDiv = document.getElementById('questions');
    let i=0;
    document.getElementById('addquestion').addEventListener('click',function(){
       let questionNum = document.getElementById('questionnumber').value;
       questionNum=parseInt(questionNum);
       if(questionNum<i){
           console.log(i,questionNum);
           console.log(questionsDiv.childNodes);
           let childNodes = questionsDiv.childNodes;
           while(childNodes.length>questionNum+1){
              questionsDiv.removeChild(childNodes[childNodes.length-1]);
           }
           i=childNodes.length-1;
           

       }
       for(i;i<questionNum;i++){

           let div=document.createElement('div');
           div.classList.add('single-question');
           let label=document.createElement('label');
           label.textContent=`Question ${i+1}`;
           let input = document.createElement('input');
           input.type="text";
           input.name="question[]"
           div.appendChild(label);
           div.appendChild(input);
           questionsDiv.appendChild(div);
       }
    })


   let checkAll = document.getElementById('select-all');
   checkAll.addEventListener('change',()=>{
        let groups = document.getElementsByClassName('select-group');
        groups=[...groups];
        if(checkAll.checked){
           groups.forEach(checkbox=>{
               checkbox.checked=true;
           })
        }
        else{
            groups.forEach(checkbox=>{
                checkbox.checked=false;
            })
        }
    })
})()