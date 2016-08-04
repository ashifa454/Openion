function copypath(id,support){
      var snackbarContainer = document.querySelector('#demo-snackbar-example');
      var handler = function(event) {
        if(id!="#")
          window.location="showPet?petId="+id;
      };
      if(support==-1){
        msg="Waiting for administrator authentication !";
        btntext="okay!"
        id="#"
      }else{
        msg=support+" People have supported this patetion";
        btntext="Read More"
      }
      var data = {
      message: msg,
      timeout: 7000,
      actionHandler: handler,
      actionText: btntext
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
    }
    function copy(){
      var snackbarContainer = document.querySelector('#demo-snackbar-example');
      var handler = function(event) {
      };
      var data = {
      message: "Do you really want to copy this link to your clipboard ?",
      timeout: 5000,
      actionHandler: handler,
      actionText: "Yes."
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data); 
    }
  function editPet(id){
    var container=document.getElementById("area"+id).innerHTML='<textarea id="editor" name="body" required=""></textarea>';
    initSample();
  }
  flag=0;
  function showEditBox(id){
    window.location="../edit?p_id="+id+"&&id="+1;
    /*var dialog = document.querySelector('dialog');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
      dialog.showModal();
      if(flag==0){
      initSample();
      flag=1;
      }
      console.log("../control/start-Patetion/"+id+"_patetion.txt");
      $("#editor").load("../control/start-Patetion/"+id+"_patetion.txt");
    dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
    dialog.querySelector('.save').addEventListener('click', function() {
          var dataval={
            "id":id,
            "newData":CKEDITOR.instances['editor'].getData()
          }
          dataval=$(this).serialize()+"&"+$.param(dataval);
        $.ajax({
        url:"../control/modifypatetion",
        data:dataval,
        method:'post',
        dataType:'JSON',
        success:function(data){
          dialog.close();
      var snackbarContainer = document.querySelector('#demo-snackbar-example');
      var handler = function(event) {
        location.reload();
      };
      var data = {
      message: data,
      timeout: 5000,
      actionHandler: handler,
      actionText: "Okay"
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);      
        }
      });
    });*/
  }
  function deletePet(){
    swal({   title: "Are you sure you want to delete?",   
      type: "warning",   
      showCancelButton: true,   
      confirmButtonColor: "#DD6B55",   
      confirmButtonText: "Yes, delete it!",   
      cancelButtonText: "No, cancel please!",   
      closeOnConfirm: false,   
      closeOnCancel: false }, 
      function(isConfirm){   
        if (isConfirm) {     
          swal("Deleted!", "Your Lokvishay has been deleted.", "success");   
          } 
          else {     
            swal("Cancelled", "Your Lokvishay is safe :)", "error");   
          } 
        });
  }
function sharePet(id){
  swal({title: "Share using ",   
    text: "<div class='ssk-group ssk-lg'><a class='ssk ssk-text ssk-facebook sharer' onclick='share(1,"+id+")'>facebook</a><a href='' class='ssk ssk-text ssk-twitter' onclick='share(2,16)'>Twitter</a><a href='' class='ssk ssk-text ssk-google-plus' onclick='share(3,16)'>google plus</a>  <a href='' class='ssk ssk-text ssk-whatsapp' onclick='share(4,16)'>whatsapp</a></div>",   
    html: true,   
    confirmButton:false,
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "Cancel",   
    closeOnConfirm: true
  });
}
function share(via,id){
  switch(via){
    case 1:
    $("#fbshare").attr("data-url","http://www.bbc.com/news/world-us-canada-36806380");
    $("#fbshare").click();
    break;
    case 2:
    $("#twshare").attr("data-url","http://www.bbc.com/news/world-us-canada-36806380");
    $("#twshare").click();
    break;
    case 3:
    $("#gpshare").attr("data-url","http://www.bbc.com/news/world-us-canada-36806380");
    $("#gpshare").click();
    break;
    case 4:
    $("#washare").attr("data-url","http://www.bbc.com/news/world-us-canada-36806380");
    $("#washare").click();
    break;
  }

}