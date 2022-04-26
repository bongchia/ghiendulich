function validate1() {
  if (document.myForm.Name.value == "") {
    alert("Please provide your name!");
    document.myForm.Name.focus();
    return false;
  }
  var emailID = document.myForm.EMail.value;
  atpos = emailID.indexOf("@");
  dotpos = emailID.lastIndexOf(".");

  if (atpos < 1 || dotpos - atpos < 2) {
    alert("Please enter correct email ID");
    document.myForm.EMail.focus();
    return false;
  }
  return true;
}
const menuBar = document.querySelector(".header-top>i");
const closeBtn = document.querySelector(".header-top ul i");
menuBar.addEventListener("click", function () {
  document.querySelector(".header-top ul").style.transform = "translateX(0%)";
  document.querySelector(".header-top ul").style.opacity = "1";
});
closeBtn.addEventListener("click", function () {
  document.querySelector(".header-top ul").style.transform = "translateX(100%)";
  document.querySelector(".header-top ul").style.opacity = "0";
});

const LHBtns = document.querySelectorAll(".js-contact");
const modal = document.querySelector(".js-modal");
const modalContainer = document.querySelector(".js-modal-container");
const modalClose = document.querySelector(".js-modal-close");

//ham hien thi modal(them class open vao modal)
function show() {
  modal.classList.add("open");
}
//ham an modal (go bo class open cua modal)
function hide() {
  modal.classList.remove("open");
}

//lap qua tung the button va nghe ham hanh vi click
for (const LHBtn of LHBtns) {
  LHBtn.addEventListener("click", show);
}

//nghe hanh vi click vao button close
modalClose.addEventListener("click", hide);

modal.addEventListener("click", hide);

modalContainer.addEventListener("click", function (event) {
  event.stopPropagation();
});
// Sự kiện scroll top
