
/**
 * Copyright (C) 2012 Alexsandro Pereira and Alex Agena
 * All rights reserved.
 * 
 * jquery.listSplit
 * A jQuery plugin to split a list, passing the number of slices as argument
 * Good for lists that need to fit horizontal spaces
 * Works on <ol>, <ul> or <dl>
 * Restore all element attributes in the container <div>
 * Returns new jQuery container to chain
 * Got some side effects on nested lists
 * 
 * Author: Alexsandro Pereira(apssouza22.com.br / @apssouza22) and Alex Agena
 * Created: 2012-01-10
 * Release: ?
 * License: http://www.opensource.org/licenses/mit-license.php
 * You can do anything with this code, but do not sue me.
 */
$.fn.configForm = function (options)
{
	var self = $(this),
		fields = self.find("input, textarea,select"),
		args = arguments,
		currentEvent,

		defaults = {
			addFieldError: function (field) {
				field.addClass("error");
			},
			validateErro: function(status){
				return status;
			} 
			,
			removeFieldError: function (field) {
				field.removeClass("error");
			},
			customValidate : function(){
				//CUIDADO NA HORA DE ADICIONAR A CLASSE ERRROR, POIS EM OUTRO MOMENTO ELA SERÁ REMOVIDA
				//USE UMA CSS CLASSE DIFERENTE
				return true;
			},
			onFocus: true
		}

	$.extend(defaults, options);

	/**
	 *ValidaÃ§Ãµes aqui, adicione a sua
	 **/
	var listMethods = {
			'required' : function(value,field)
			{
				if(field.attr('type') == 'checkbox') {
					return field.is(':checked');
				}
				
				if (field.attr('type') == 'radio') {
					var itens = self.find("[name=" + field.attr("name") + "]");
					return itens.filter(":checked").length != 0;
				}

				return value != "";
			},

			'email' : function(value)
			{
				return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(value);
			},
			
			'number' : function(value)
			{
				return /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(value);
			},
			
			'digits' : function(value) 
			{
				return  /^\d+$/.test(value);
			},
			
			'cep' : function(value) 
			{
				return  /^\d+$/.test(value) && value.length == 8;
			},
			
			'equal' : function (value, field) {
				
				if (!currentEvent) return true;

				var value = field.val(),
					fields = self.find("[name=" + field.attr("name") + "]"),
					result;

				fields.each(function () {
					result = value === $(this).val();
					return result;
				});

				return result;
			},
			
			// based on http://en.wikipedia.org/wiki/Luhn
			'creditcard' : function(value, element) 
			{
				// accept only spaces, digits and dashes
				if (/[^0-9 -]+/.test(value))
					return false;
				var nCheck = 0,
					nDigit = 0,
					bEven = false;
	
				value = value.replace(/\D/g, "");
	
				for (var n = value.length - 1; n >= 0; n--) {
					var cDigit = value.charAt(n);
					var nDigit = parseInt(cDigit, 10);
					if (bEven) {
						if ((nDigit *= 2) > 9)
							nDigit -= 9;
					}
					nCheck += nDigit;
					bEven = !bEven;
				}
	
				return (nCheck % 10) == 0;
			},
			
			url: function(value, element) {
				// contributed by Scott Gonzalez: http://projects.scottsplayground.com/iri/
				return  /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(value);
			},
			
			/*valida a extensão do arquivo*/
			ext: function(value, element) {
				var retorno = false;
				var extensoes = element.data('ext').split(' ');
				var valueExt = value.split('.');
				var ext = valueExt[valueExt.length-1];
				
				$.each(extensoes ,function(i,valor){
					if( ext == valor){
						retorno = true;
						return false
					}
				})
				
				return retorno;
				
			},

			'cpf' : function (value)
			{
				if(value == ""){
					return true;
				}
				
				value = value.replace('.', '');
				value = value.replace('.', '');
				cpf = value.replace('-', '');
				while(cpf.length < 11)
					cpf = "0" + cpf;
				var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/,
					a = [],
					b = new Number,
					c = 11;
					

				for( i = 0; i < 11; i++) {
					a[i] = cpf.charAt(i);
					if(i < 9)
						b += (a[i] * --c);
				}
				if(( x = b % 11) < 2) {
					a[9] = 0
				} else {
					a[9] = 11 - x
				}
				b = 0;
				c = 11;
				for( y = 0; y < 10; y++)
				b += (a[y] * c--);
				if(( x = b % 11) < 2) {
					a[10] = 0;
				} else {
					a[10] = 11 - x;
				}
				if((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg))
					return false;
				return true;
			},

			'date' : function(value)
			{
				return !/Invalid|NaN/.test(new Date(value));
			}
		};

	/*
	 * Validate Field
	 *
	 */
	function validateField (field)
	{
		var result;
		var value	= field.val();
		var classes	=  field.attr('class');

		if(!classes) return true;

		classes		=  classes.split(' ');

		var fieldValue	= field.val();
		var boolResult	= true;

		if (field.attr("min"))
			return checkMin(field);

		$.each(classes,function(i, value){
			if (listMethods.hasOwnProperty(value)) {
				boolResult = listMethods[value](fieldValue,field);
				return  boolResult;
			}
		})

        return boolResult;
	}

	function checkMin(field)
	{
		return field.val().length >= parseInt(field.attr("min"));
	}


	//LISTENER QUE DISPARA A VALIDAÇÃO NO SUBMIT
	self.submit(executeValidate);
	
	function executeValidate (event)
	{
		var currentField;
		var resultField;
		var finalResult = true;
		currentEvent = event || false;
		
		if(!defaults.customValidate()){
			finalResult = false;
		}
		
		// check each field
		fields.each(function ()
		{
			currentField = $(this);
			resultField = validateField(currentField);
			if(!resultField) {
				finalResult = false;
				defaults.addFieldError(currentField);
			} else {
				defaults.removeFieldError(currentField);
			}
		});

		// if success
		if (finalResult) {
			//IF EXISTE CALLBECK
			if(typeof(args[args.length -1]) == 'function'){
				args[args.length -1]();
				return false;
			}
		}else{
			defaults.validateErro();
		}
		
		return finalResult;
	}

	if(defaults.onFocus) {
		fields.focusout(function (event)
		{
			currentEvent = false;
			if(validateField($(this))) {
				defaults.removeFieldError($(this));
			} else {
				defaults.addFieldError($(this));
			}
		});
	}
	
	return {
		executeValidate: executeValidate
	};
}