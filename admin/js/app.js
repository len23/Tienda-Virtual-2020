const input_image  = document.querySelector('#uploadImage');
const preview = document.querySelector('.preview');

input_image.style.opacity = 0;
input_image.addEventListener('change', updateImageDisplay);

const fileTypes = [
  "image/apng",
  "image/bmp",
  "image/gif",
  "image/jpeg",
  "image/pjpeg",
  "image/png",
  "image/svg+xml",
  "image/tiff",
  "image/webp",
  "image/x-icon"
];

function validFileType(file) {
  return fileTypes.includes(file.type);
}


function updateImageDisplay(params) {
  while(preview.firstChild) {
    preview.removeChild(preview.firstChild);
  }
  const curFiles = input_image.files;
  if(curFiles.length === 0) {
    
  }else {
    if(validFileType(curFiles[0])) {
      const image = document.createElement('img');
      image.src = URL.createObjectURL(curFiles[0]);
      image.classList.add("w-100");
      preview.appendChild(image);
    } else {
      preview.innerHTML = `<p>El archivo ${curFiles[0].name}: <strong>No es un formato válido.</strong></p>`; 
      /* preview.appendChild(`File name ${file.name}: Not a valid file type. Update your selection.`); */
    }
  } 
  
}
