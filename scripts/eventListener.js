const popUpBTN = document.querySelector("#create");
const closeButton = document.querySelector("#closeBtn");
const popUpContainer = document.querySelector(".popUpCreate");

popUpBTN.addEventListener("click", () => {
    if(popUpContainer.style.display == "none"){
        popUpContainer.style.display = "flex";
    }else{
        popUpContainer.style.display = "none";
    }
})

closeButton.addEventListener("click", () => {
    popUpContainer.style.display = "none";
})

const addColumnBtn = document.querySelector("#addColumn");
const XBtn4AddColumn = document.querySelector("#XBtn4AddColumn");
const popUpAddColumnContainer = document.querySelector(".popUpAddColumn");

addColumnBtn.addEventListener("click", () => {
    if(popUpAddColumnContainer.style.display == "none"){
        popUpAddColumnContainer.style.display = "flex";
    }else{
        popUpAddColumnContainer.style.display = "none";
    }
})

XBtn4AddColumn.addEventListener("click", () => {
    popUpAddColumnContainer.style.display = "none";
})

const removeColumnBtn = document.querySelector("#removeColumn");
const XBtn4RemoveColumn = document.querySelector("#XBtn4RemoveColumn");
const popUpRemoveColumnContainer = document.querySelector(".popUpRemoveColumn");

removeColumnBtn.addEventListener("click", () => {
    if(popUpRemoveColumnContainer.style.display == "none"){
        popUpRemoveColumnContainer.style.display = "flex";
    }else{
        popUpRemoveColumnContainer.style.display = "none";
    }
})

XBtn4RemoveColumn.addEventListener("click", () => {
    popUpRemoveColumnContainer.style.display = "none";
})

const addRecordBtn = document.querySelector("#addRecord");
const XBtn4AddRecord = document.querySelector("#XBtn4AddRecord");
const popUpAddRecordContainer = document.querySelector(".popUpAddRecord");

addRecordBtn.addEventListener("click", () => {
    if(popUpRemoveColumnContainer.style.display == "none"){
        popUpAddRecordContainer.style.display = "flex";
    }else{
        popUpAddRecordContainer.style.display = "none";
    }
})

XBtn4AddRecord.addEventListener("click", () => {
    popUpAddRecordContainer.style.display = "none";
})


function showPassword(){
    const passwordInput = document.getElementById("passwordInput");

    if(passwordInput.type === "password"){
        passwordInput.type = "text";
    }else{
        passwordInput.type = "password";
    }
}
