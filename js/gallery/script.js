const imagesContainerEl = document.querySelector(".images");
const loadingContainerEl = document.querySelector(".loading-container");
const mainImageEl = document.querySelector(".main-image");

imagesContainerEl.addEventListener("click", function (e) {
  const image = e.target;

  if (!image.classList.contains("image") /* image.tagName !== "IMG" */) {
    return;
  }

  loadingContainerEl.style.display = "flex";

  const imageInstance = new Image();
  imageInstance.src = image.dataset.url;
  imageInstance.onload = function () {
    loadingContainerEl.style.display = "none";
  };

  mainImageEl.src = image.dataset.url;

  const parentEl = document.querySelector(".image-container.active");

  if (parentEl) {
    parentEl.classList.remove("active");
  }

  image.parentElement.classList.add("active");
});

function changeUrlImageSize(url, width, height = width) {
  const { devicePixelRatio } = window;
  const arr = url.split("/");

  arr.splice(
    -2,
    2,
    width * devicePixelRatio ?? 1,
    height * devicePixelRatio ?? 1
  );

  return arr.join("/");
}

function createImage(url) {
  const smallImage = changeUrlImageSize(url, 80);
  const bigImage = changeUrlImageSize(url, 1000, 600);

  const imageContainerEl = document.createElement("div");
  imageContainerEl.classList.add("image-container");

  const imageEl = document.createElement("img");
  imageEl.classList.add("image");
  imageEl.dataset.url = bigImage;
  imageEl.src = smallImage;

  imageContainerEl.appendChild(imageEl);

  return imageContainerEl;
}

fetch(
  `https://picsum.photos/v2/list?limit=20&page=${Math.floor(
    Math.random() * 21
  )}`
)
  .then(function (resp) {
    return resp.json();
  })
  .then(function (images) {
    const firstImage = images[0];

    mainImageEl.style.display = "block";
    mainImageEl.src = changeUrlImageSize(firstImage.download_url, 1000, 600);

    // imagesContainerEl
    //   .querySelectorAll(".image-container")
    //   .forEach(function (el) {
    //     el.remove();
    //   });

    images.forEach(function (image) {
      const imageEl = createImage(image.download_url);

      imagesContainerEl.appendChild(imageEl);
    });

    imagesContainerEl.querySelector(".image-container").classList.add("active");
  });
