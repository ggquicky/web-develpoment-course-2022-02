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

const addImageButtonEl = document.querySelector(".add-image-button");

addImageButtonEl.addEventListener("click", function () {
  const imageContainerEl = document.createElement("div");
  imageContainerEl.classList.add("image-container");

  const imageEl = document.createElement("img");
  imageEl.classList.add("image");
  imageEl.dataset.url = "https://picsum.photos/id/4/1000/600";
  imageEl.src = "https://picsum.photos/id/4/200/200";

  imageContainerEl.appendChild(imageEl);

  imagesContainerEl.appendChild(imageContainerEl);
});

function changeUrlImageSize(url, width, height = width) {
  const arr = url.split("/");

  arr.splice(
    -2,
    2,
    width * window.devicePixelRatio,
    height * window.devicePixelRatio
  );

  return arr.join("/");
}

function getImages(url) {
  return [changeUrlImageSize(url, 80), changeUrlImageSize(url, 1000, 600)];
}

function createImage(url) {
  const [smallImage, bigImage] = getImages(url);

  const imageContainerEl = document.createElement("div");
  imageContainerEl.classList.add("image-container");

  const imageEl = document.createElement("img");
  imageEl.classList.add("image");
  imageEl.dataset.url = bigImage;
  imageEl.src = smallImage;

  imageContainerEl.appendChild(imageEl);

  return imageContainerEl;
}

fetch("https://picsum.photos/v2/list?limit=20")
  .then(function (resp) {
    return resp.json();
  })
  .then(function (data) {
    const firstImage = data[0];

    mainImageEl.style.display = "block";
    mainImageEl.src = getImages(firstImage.download_url)[1];

    data.forEach(function (image) {
      const imageEl = createImage(image.download_url);

      imagesContainerEl.appendChild(imageEl);
    });

    imagesContainerEl.querySelector(".image-container").classList.add("active");
  });
