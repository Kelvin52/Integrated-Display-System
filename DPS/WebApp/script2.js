//console.log(document.querySelector("video"));

var vidplayer = document.getElementById("video");
var promovids = [
  "PromoVid/Coming to Nintendo Switch.mp4", 
  "PromoVid/jerma the bee.mp4",
  "PromoVid/MORTAL JERMBAT.mp4"
];

const volume = document.querySelector("video").volume;
document.querySelector("video").volume = 0.2;

console.log(vidplayer);

var activeVideo = 0;
vidplayer.addEventListener('ended', function() {
  // update the new active video index
  activeVideo = (++activeVideo) % promovids.length;

  // update the video source and play
  vidplayer.src = promovids[activeVideo];

  vidplayer.play();
});

function myFunction() {
    document.getElementsByTagName("H1")[0].setAttribute("class", "democlass"); 
  }

  
