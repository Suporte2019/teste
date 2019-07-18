var idprograma = null;

var optionsprograma = {
	url: function(programa) {
		return "{{ url('app\Models\wsim\ACL\Permission.php') }}" + programa;
	},

	getValue: function(element) {
		return element.nomeprograma;
	},

	list: {		
		onChooseEvent: function() {	
			idprograma = $("#autocomplete-programa").getSelectedItemData().idprograma;		
			$('#programa').val(idprograma);			
		},

		onHideListEvent: function(){
			if(idprograma == null){
				$("#autocomplete-programa").val('');	
			}		
		}

	}
};

$("#autocompleta-programa").easyAutocomplete(optionsPrograma);
