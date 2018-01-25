require(['jquery', 'jquery/ui'], function($){
    $( ".name_card" ).click(function() {
        var $selectechars = "";
        var $selectioncount = "";

        //count selection
        $('.name_card').each(function(){
            if($(this).attr('data-charselected')==1){
                $selectioncount++;
            }
        });

        //toggle selected enable/disable
        if($(this).attr('data-charselected')== 0 && $selectioncount < 3) {
            $selectioncount++;
            $(this).attr('data-charselected', 1);
            $(this).addClass('charselected');
                $(this).find('input:hidden').attr('disabled', false);
            } else {
            if($(this).attr('data-charselected')== 1){
                $selectioncount--;
            }
            $(this).attr('data-charselected', 0);
            $(this).removeClass('charselected');
            $(this).find('input').attr('disabled', true);
            $(this).find('input:hidden').attr('disabled', true);
        }

        //get selected characters
        $('.name_card').each(function(){

            if($(this).attr('data-charselected')==1){
                if($selectechars.length > 0) {
                    $selectechars = $selectechars+", ";
                }
                $selectechars = $selectechars+$(this).attr('data-charname');
            }
        });

        //toggle values
        if($selectechars.length > 0) {
            $('.status_message p').text("You have Selected:");
            $('.selected_chars p').text($selectechars);

        }else {
            $('.status_message p').text("");
            $('.selected_chars p').text("");

        }
        console.log($selectioncount);
        if($selectioncount >2){
            $('.confirm_selection').removeClass('disabled');
        } else {
            $('.confirm_selection').addClass('disabled');
        }

    });
});