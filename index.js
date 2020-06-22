
function pressed(e){
    if(e.keyCode==13)
        newTask();
}

function newTask(){
    var val = document.querySelector("#taskAdd");
    val = val.value;
    // console.log(ele);
    var parent = document.querySelector(".notCompleted");
    var newEle = document.createElement("p");
    newEle.setAttribute('length',val.length);
    newEle.setAttribute("id",val);
    newEle.innerHTML = val + "<br><a id='"+val+"btn' onclick='completed(this.id)'> <i class='fa fa-check-circle' aria-hidden='true'></i> </a><a id='"+val +"btn' onclick='delTaskCom(this.id)'><i id='del' class='fa fa-trash' aria-hidden='true'></i></a>";
    parent.appendChild(newEle);
}
function completed(id){
    id = id.slice(0,id.length-3)
    console.log(id)
    var ele = document.getElementById(id)
    var parent = document.querySelector(".notCompleted")
    var newparent = document.querySelector(".Completed")
    var len = ele.getAttribute('length')
    console.log(len)
    ele.innerHTML = ele.innerHTML.slice(0,len) + "<br><a id='"+id+"btn' onclick='notcompleted(this.id)'> <i class='fa fa-close' aria-hidden='true'></i> </a><a id='"+id+"btn' onclick='delTaskNotCom(this.id)'><i id='del' class='fa fa-trash' aria-hidden='true'></i></a>"
    newparent.appendChild(ele)
}
function notcompleted(id){
    id = id.slice(0,id.length-3)
    console.log(id)
    var ele = document.getElementById(id)
    var parent = document.querySelector(".Completed")
    var newparent = document.querySelector(".notCompleted")
    var len = ele.getAttribute('length')
    console.log(len)
    ele.innerHTML = ele.innerHTML.slice(0,len) + "<br><a id='"+id+"btn' onclick='completed(this.id)'> <i class='fa fa-check-circle' aria-hidden='true'></i> </a><a id='"+id+"btn' onclick='delTaskCom(this.id)'><i id='del' class='fa fa-trash' aria-hidden='true'></i></a>"
    newparent.appendChild(ele)
}
function delTaskCom(id){
    id = id.slice(0,id.length-3)
    console.log(id)
    var ele = document.getElementById(id)
    var parent = document.querySelector(".notCompleted")
    parent.removeChild(ele)
}
function delTaskNotCom(id){
    id = id.slice(0,id.length-3)
    console.log(id)
    var ele = document.getElementById(id)
    var parent = document.querySelector(".Completed")
    parent.removeChild(ele)
}
function darkMode(){
    var ele = document.body
    ele.classList.toggle("dark-mode")
}