function ganti(Name,elmnt,color){
var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("uh");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
    tabcontent[i].style.backgroundColor = color;
  }
  tablinks = document.getElementsByClassName("txtds");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  elmnt.style.backgroundColor = color;
  document.getElementById(Name).style.display = "block";
}