// ========== Window functions
window.addEventListener("scroll", () => {
    // ========== Navbar Function
    const nav = document.querySelector('header');
    nav.classList.toggle("sticky", window.scrollY > 0);
});

// ========== Switcher form function
function toggleSwitcherForm(){
    document.querySelector('#login-container').classList.toggle('signup-form_active')
};

// ========== Gallery Section
let galleryItems = [
    {
        gallery_img: 'image-2.jpg',
        gallery_img_desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, minima.'
    },
    {
        gallery_img: 'image-3.jpg',
        gallery_img_desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, minima.'
    },
    {
        gallery_img: 'image-4.jpg',
        gallery_img_desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, minima.'
    },
    {
        gallery_img: 'image-5.jpg',
        gallery_img_desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, minima.'
    },
    {
        gallery_img: 'image-6.jpg',
        gallery_img_desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, minima.'
    },
    {
        gallery_img: 'image-7.jpg',
        gallery_img_desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, minima.'
    }
]
const galleryContainer = document.querySelector("#gallery_body-container")
function pushGalleryItems(){
    galleryItems.forEach((value) => {
        let newDiv = document.createElement('div')
        newDiv.classList.add("gallery-item")
        newDiv.innerHTML = `
        <img src="/static/images/${value.gallery_img}">
        <div class="like-button">
            <i class="fa-regular fa-heart" onclick="likeToggleBtn(event)"></i>
        </div>
        <div class="expand-img">
            <i class="glr-expd_button" onclick="ExpandImgBtn(event)"></i>
        </div>
        <div class="desc-pict">
            <p>
                ${value.gallery_img_desc}
            </p>
        </div>
        `;
        galleryContainer.appendChild(newDiv);
    })
}
pushGalleryItems()

// Select active items
let firstItem = document.getElementById("gallery_body-container").firstElementChild.classList.add("active")
galleryContainer.addEventListener("click", (event) => {

    if (event.target.classList.contains("gallery-item") && !event.target.classList.contains("active")) {
        // Deactivate existing active 'item' & 'expanded image'
        galleryContainer.querySelector(".active").classList.remove("active", "expanded")
        // Active new 'item'
        event.target.classList.add("active")
    }
})
// Function for button to expand the images
function ExpandImgBtn(event){
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.classList.toggle('expanded')
}

// Liked button function
function likeToggleBtn(event){
    var buttonCLicked = event.target
    buttonCLicked.classList.toggle("liked")
}