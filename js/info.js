const models = [
  { name: "John Doe", img: "media/grey.jpg", desc: "Model" },
  { name: "John Doe", img: "media/pink.png", desc: "Model" }
];

let currentIndex = 0;

function updateCard() {
  document.querySelector('.model-name').innerText = models[currentIndex].name;
  document.getElementById('main-img').src = models[currentIndex].img;
  document.querySelector('.profile-info h3').innerText = models[currentIndex].desc;
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % models.length;
  updateCard();
}

function prevSlide() {
  currentIndex = (currentIndex - 1 + models.length) % models.length;
  updateCard();
}
const coll = document.getElementsByClassName("collapsible");

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}