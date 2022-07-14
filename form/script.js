let sections= document.querySelectorAll("section");
let main=document.getElementById("main");
let next=document.querySelectorAll(".next");
let back=document.querySelectorAll(".back");
let clear=document.querySelector(".clear");
let inpu=document.querySelectorAll("input")
let tit=document.querySelectorAll(".tit");
// const subform=document.querySelector(".sub_form").clientWidth

// let current=0;
let err=0
let count=0
let prevnock=document.getElementById("bock")
let Nlink=document.getElementById("nock")

// variables declaration
let link=Nlink.getAttribute("href")
let important=document.querySelectorAll(".im")
let container=[]
Nlink.addEventListener("click",nxtpage)
//  prevnock.addEventListener("click",bckpage)

// tit.style.width= "200px"
clear.addEventListener("click",erase)




// function

// function clear_all(i){
//     return i.addEventListener("click",erase)
// }

function remove_event(item){
    return item.addEventListener("click",bckpage)
}

 
function add_event(item){
    return item.addEventListener("click",nxtpage)
}
// adding even listeners to next and back pages 


// let getSelectedValue 
function nxtpage(){
    
    // let container_two=[]

    for(i of important){
        
    
        if(i.type!="radio"){
            if(i.value==""||i.value==null){
            i.parentElement.classList.add("red")
            // let temp=current
            // current=temp
         
        }
        else{
            if(i.parentElement.classList.contains("red")){
                
                i.parentElement.classList.remove("red")
                
            }
            
            
            
        }    
    }
    
    if(i.type=="radio"){
        
        
        container.push(i)
    }
    
}
// console.log(container)
    for(let c=0;c<container.length;c+=2){
    
        console.log(container[c].parentElement.parentElement.parentElement)
      if(container[c].checked==true||container[c+1].checked==true){

        if(container[c].parentElement.parentElement.parentElement.classList.contains("red")){
                
            container[c].parentElement.parentElement.parentElement.classList.remove("red")
            
        }
      }
      else{
        container[c].parentElement.parentElement.parentElement.classList.add("red")
      }
    
        }
        
// console.log(container_two)
//         for(let r=0;r<container_two.length;r++){
//          getSelectedValue = document.querySelector("input[name="+container[r]+":checked");   
            
//                   console.log(getSelectedValue)
//         }
    
        for(let n=0;n != important.length;n++){
            if(important[n].parentElement.classList.contains("red") ||important[n].parentElement.parentElement.parentElement.classList.contains("red")){
          
                err++
         // break;

        //             
          }
        }
        //   console.log(err)
           

            if(err>0){
          Nlink.setAttribute("href","#")
          err=0
          
          }
            else{
                Nlink.setAttribute("href",link)
          err=0
          
          }
                
        
            
}

function bckpage(){
    // console.log(current)
   
    
    
    
    
}

function erase(){

    

    
    for (const i of inpu){
      i.value=" "
    }
    
}


// main.innerHTML=sections[2].innerHTML;
