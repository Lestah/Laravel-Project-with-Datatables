$(document).on('click', 'edit-modal', function() {
    $('#footer_action_button').text("Update");
    $('#footer_action_button').addClass("glyphicon-icon");
    $('#footer_action_button').removeClass("glyphicon-trash");
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal_title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('$fid').val($($this).data('id'));
    $('$t').val($($this).data('title'));
    $('$d').val($($this).data('body'));
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function(){
    $.ajax({
        type: 'post',
        url: '/editItem',
        data {
            '_token': $('input[name=_token]').val(),
            'id': $("#fid").val(),
            'title': $('#t').val(),
            'description': $('#d').val()
        }
        success: function(data) {
            $('.item' + data.id).replaceWith("<tr class="item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.body + "</td><td><button class="edit-item btn btn-info" data-id='" + data.id +"' data.title='" + data.title + "' data-description='" + data.body + "'><span class='glyphicon glyphicon-edit'></span>Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id +"' data.title='" + data.title + "' data-description='" + data.body + "'><span class='glyphicon glyphicon-trash'></span>Delete</button></td></tr>");
        }
    });
});

$('#user_update').click(function(){
        var edit_id = $('#edit_id').val();
        var edit_name = $('#edit_name').val();
        var edit_email = $('#edit_email').val();
        var edit_company_name = $('#edit_company_name').val();
        var edit_mobile = $('#edit_mobile').val();
        var edit_timezone = $('#edit_timezone').val();
        var edit_best_time_to_call = $('#edit_best_time_to_call').val();
        var edit_how_did_you_hear = $('#edit_how_did_you_hear').val();
        var edit_address = $('#edit_address').val();
        var edit_city = $('#edit_city').val();
        var edit_nasp = $('#edit_nasp').val();
        var edit_nnasp = $('#edit_nnasp').val();
        var edit_country = $('#edit_country').val();
        var edit_postal = $('#edit_postal').val();
        var edit_past_exp = $('#edit_past_exp').val();
        var edit_desc_exp = $('#edit_desc_exp').val();
        var edit_promote = $('#edit_promote').val();
        var edit_woaylf = $('#edit_woaylf').val();
        var edit_web_url = $('#edit_web_url').val();
        var edit_incentive_traffic = $('#edit_incentive_traffic').val();
        var edit_desc_incentive = $('#edit_desc_incentive').val();
        var edit_trade = $('#edit_trade').val();
        var edit_freelance = $('#edit_freelance').val();
        var edit_agree = $('#edit_agree').val();
        var CSRF_TOKEN = '{{csrf_token()}}';
            
        var test = {edit_id:edit_id,edit_name:edit_name, edit_email:edit_email, edit_company_name:edit_company_name, edit_mobile:edit_mobile, edit_timezone:edit_timezone, edit_best_time_to_call:edit_best_time_to_call, edit_how_did_you_hear:edit_how_did_you_hear, edit_address:edit_address, edit_city:edit_city, edit_nasp:edit_nasp, edit_nnasp:edit_nnasp, edit_country:edit_country, edit_postal:edit_postal, edit_past_exp:edit_past_exp, edit_desc_exp:edit_desc_exp, edit_promote:edit_promote, edit_woaylf:edit_woaylf, edit_web_url:edit_web_url, edit_incentive_traffic:edit_incentive_traffic, edit_desc_incentive:edit_desc_incentive, edit_trade:edit_trade, edit_freelance:edit_freelance, edit_agree:edit_agree};
        
        //console.log(test); return false;
        $.ajax({    
            type: 'GET',
            url: "{{ url('admin/users/edit_user_front') }}",
            data: test,
            dataType: 'text',
            success: function (data) {
                location.reload(true);
            },
            error: function (data) {
                console.log(data);
                //alert(errortest);
            }
        });
    });
});

//controller

/*public function edit_user_front(){
        $id = $_REQUEST['edit_id'];
        $name = $_REQUEST['edit_name'];
        $email = $_REQUEST['edit_email'];
        $company_name = $_REQUEST['edit_company_name'];
        $mobile = $_REQUEST['edit_mobile'];
        $timezone = $_REQUEST['edit_timezone'];
        $best_time_to_call = $_REQUEST['edit_best_time_to_call'];
        $how_did_you_hear = $_REQUEST['edit_how_did_you_hear'];
        $address = $_REQUEST['edit_address'];
        $city = $_REQUEST['edit_city'];
        $nasp = $_REQUEST['edit_nasp'];
        $nnasp = $_REQUEST['edit_nnasp'];
        $country = $_REQUEST['edit_country'];
        $postal = $_REQUEST['edit_postal'];
        $past_exp = $_REQUEST['edit_past_exp'];
        $desc_exp = $_REQUEST['edit_desc_exp'];
        $promote = $_REQUEST['edit_promote'];
        $woaylf = $_REQUEST['edit_woaylf'];
        $web_url = $_REQUEST['edit_web_url'];
        $incentive_traffic = $_REQUEST['edit_incentive_traffic'];
        $desc_incentive = $_REQUEST['edit_desc_incentive'];
        $trade = $_REQUEST['edit_trade'];
        $freelance = $_REQUEST['edit_freelance'];
        $agree = $_REQUEST['edit_agree'];

        
        DB::table('users')
        ->where('id', $id)
        ->update(
            array(
                'name' => $name,
                'email' => $email,
                'company_name' => $company_name,
                'mobile_phone' => $mobile,
                'timezone' => $timezone,
                'best_time_to_call' => $best_time_to_call,
                'how_did_you_hear' => $how_did_you_hear,
                'address' => $address,
                'city' => $city,
                'nasp' => $nasp,
                'nnasp' => $nnasp,
                'country' => $country,
                'postal' => $postal,
                'past_exp' => $past_exp,
                'desc_exp' => $desc_exp,
                'promote' => $promote,
                'woaylf' => $woaylf,
                'web_url' => $web_url,
                'incentive_traffic' => $incentive_traffic,
                'desc_incentive' => $desc_incentive,
                'trade' => $trade,
                'freelance' => $freelance,
                'agree' => $agree
            )
        );

    
        $data['updated'] = "1";
        //$data['test'] = 'test@test.com';
        echo json_encode($data);
        
    }
*/