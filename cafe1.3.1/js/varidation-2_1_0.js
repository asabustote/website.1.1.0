//Jquery validation
$(document).ready(function(){
    
  $(function(){
	$('.validationForm-JQ').validate({
		rules: {
            name: {
              required: true,
              maxlength: 10,
            },
            kana: {
              required: true,
              maxlength: 10,
            },
            tel: {
              required: false,
              number : true,
            },
            email: {
              required: true,
              email: true,
            },
            inquiry: {
              required: true,
            },
		},

  messages: {
            name: {
                required: 'これは必須項目です。'
            },
            kana: {
                required: 'これは必須項目です。'
            },
            email: {
                required: 'これは必須項目です。'
            },
            inquiry: {
                required: 'これは必須項目です。'
            }
        }

	})
})

});