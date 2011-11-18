var site;
$(document).ready(function() {
    site=$(".data-page").attr("site");
    $( "#accordion" ).accordion();
    $(".txtDefaultHtmlArea").htmlarea();
    
    $("ul.menu-options li a").click(function(){
        var key=$(this).attr("href");
        var layout=$(this).parent().parent().attr("layout");
        $.ajax({
                url: site+'languages/traslator/'+layout+'/'+key,
                success:function(data){
                    $(".panel-center").html(data);
                    init_tab();
                    }
            });
            return false;
    })
})

function init_save(){
    $(".save_language").button();
  $(".save_language").click(function(){
    var id=$(this).attr("idd");
    var tipo=$(this).attr("tipo");
    var data="texto="+$('#HtmlArea_'+id+'_'+tipo).htmlarea('toHtmlString');
    $.ajax({
          type: 'POST',
          url: site+'languages/save/'+id+'/'+tipo,
          data: data,
          success:function(data){
                $.jGrowl("<p class='info'>Se actualizado correctamente!!</p>", { life: 3000 });
            }
        });
    return false;
    })
};

function init_tab(){
$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				},
                success:function(){
                    $(".txtDefaultHtmlArea").htmlarea();
                    init_save();    
                }
			}
		});
  }