function rowStyle(row, index) {
	//var classes = ['active', 'success', 'info', 'warning', 'danger'];
	var classes = ['success'];

	if (index % 2 === 0) {
		return {
			//classes: classes[index / 2]
			classes: classes[0]
		};
	} else {
		return {};
	}
}

function noFormatter(value, row, index) {
	return index + 1;
}

function sexFormatter(value, row) {
	
	return (value == 0 ? 'F' : 'M');
}

function countryFormatter(value, row) {
	if(value === null) { return null; }

	var baseurl = $('#hid_baseurl').val();
	var ary_val = value.split("[-S-]");
	var ret = "<img src='" + baseurl + "assets/img/flags_iso/24/" + ary_val[0].toLowerCase() +".png' title='" + ary_val[1] + "' data-toggle='tooltip' data-placement='top'>";
	return ret;
}


function operateFormatter(value, row, index) {
	/*
    return [
        '<a class="edit ml10" href="javascript:void(0)" title="Edit">',
            '<i class="glyphicon glyphicon-edit"></i>',
        '</a>',
        '<a class="remove ml10" href="javascript:void(0)" title="Remove">',
            '<i class="glyphicon glyphicon-remove"></i>',
        '</a>'
    ].join('');
    */
    return [
        '<a class="edit ml10" href="javascript:void(0)" title="Edit">',
            '<i class="glyphicon glyphicon-edit"></i>',
        '</a>'
    ].join('');
}

function boolFormatter(value) {
	if(value === null) { return null; }
	if(value == 1) { return "<span class='glyphicon glyphicon-ok'></span>";}
}

$("select[role=criteria]").change(function() {
	$('#tbl_main').bootstrapTable('refresh');
});
$("input[role=criteria]").change(function() {
	$('#tbl_main').bootstrapTable('refresh');
});

$('#btn_clear').click(function() {
	$("select[role=criteria]").val(0);
	$("input[role=criteria]").prop('checked',false);
	$('#tbl_main').bootstrapTable('refresh');
});

window.operateEvents = {
    'click .edit': function (e, value, row, index) {
    	window.location = window.location.pathname + '/' + row.id;
        console.log(value, row, index);
    },
    'click .remove': function (e, value, row, index) {
		$.ajax({
			type: "DELETE",
			url: 'api/teacher',
			data: { id: row.id },
			statusCode: {
				200: function() {
					alert("成功刪除");
					location.reload();
				}
			},
			error: function() {
				alert('刪除失敗');
			}
		})

        console.log(value, row, index);
    }
};