$(document).ready(function(){
 
  $.ajaxSetup({
    timeout: 10000,
    cache: false,
    error:function(x,e){
        if(x.status==0){
          alert('You are offline,please check your connection');
        }else if(x.status==404){
          alert('Requested URL unknown');
        }else if(x.status==500){
          alert('Internal Server Error!');
        }else if(e=='parsererror'){
          alert('Error.\nParsing JSON Request failed!');
        }else if(e=='timeout'){
          alert('Request Time out!');
        }else {
          alert('Unknown Error: \n'+x.responseText);
        }
    }
  });
 
  
  $('#divLoadingAttributes').ajaxStart(function(){
      $(this).fadeIn();
      $(this).html("<img src='loading.gif' /> ");
  }).ajaxStop(function(){
      $(this).fadeOut();
  });
 
  
 loadData2();
 
  
  function loadData2()
  {
    var dataString;
    var search = $("input#fieldSearchAttributes").val();
    var record = $("select#pageRecordAttributes").val();
	dataString = 'name='+ search + '&perpage='+ record;
    
      $.ajax({
      url: "attributes/tablepage.php",
      type: "GET",
      data: dataString,
      success:function(data)
      {
        $('#divPageDataAttributes').html(data);
      }
    });
  }
  
  $("form#formSearch").submit(function()
  {
     loadData2();
	return false;
    });
  
  
 }); 