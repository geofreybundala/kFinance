 
  window.onload = function () {

      bcheck();
      Ccheck();
  };
 
 function bcheck() {

     selectBox = document.getElementById('baptized').value;
     bcontrol = document.getElementById('bcontrol')
     // val value = selectBox.options[selectBox.selectedIindex].text;

     //alert(selectBox);
     if (selectBox === 'no') {
         bcontrol.style.display = "none";

     } else {

         bcontrol.style.display = "block";
     }

 }


function Ccheck() {

    selectBox = document.getElementById('communion').value;
    bcontrol = document.getElementById('c_control')
    // val value = selectBox.options[selectBox.selectedIindex].text;

   

    // //alert(selectBox);
    if (selectBox === 'no') {
        bcontrol.style.display = "none";

    } else {

        bcontrol.style.display = "block";
    }

}
 



    

   

   