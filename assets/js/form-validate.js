// Constructor
function Validator(options) {


    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }

    }

    var selectorRules = {};

    //thực hiện validate
    function validate(inputElement, rule) {
        var errorElement = getParent(inputElement, options.formGroup).querySelector(options.errorSelector);

        var errorMessage;
        // = rule.test(inputElement.value);
        // vì ở dưới có các phần tử trong mảng đã được lấy chính hàm test chứ không phải từ rule

        var rules = selectorRules[rule.selector];

        for (var i = 0; i < rules.length; ++i) {

            switch (inputElement.type) {
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](formElement.querySelector(rule.selector + ':checked'));

                    break;
                default:
                    errorMessage = rules[i](inputElement.value)

            }



            if (errorMessage) break;
        }

        if (errorMessage) {
            errorElement.innerText = errorMessage;
            getParent(inputElement, options.formGroup).classList.add('invalid')
        } else {
            getParent(inputElement, options.formGroup).classList.remove('invalid')
            errorElement.innerText = '';
        }
        return !errorMessage;
    }

    var formElement = document.querySelector(options.form);
    // if (formElement) {
    //     formElement.onsubmit = function (e) {

    //         isFormValid = true;



    //         e.preventDefault(); //loại bỏ hành động mặc định của form
    //         options.rules.forEach(function (rule) {
    //             var inputElement = formElement.querySelector(rule.selector);

    //             var isValid = validate(inputElement, rule)
    //             if(!isValid) {
    //                 isFormValid = false;
    //             }
    //         });




    //         if (isFormValid){
    //             if (typeof options.onSubmit === 'function') {
    //                 var enableInputs = formElement.querySelectorAll('[name]');

    //                 var formValues = Array.from(enableInputs).reduce(function(values, input){

    //                     switch(input.type) {
    //                         case 'radio':
    //                             values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value;
    //                             break;
    //                         case 'checkbox':
    //                             if(!input.matches(':checked')) {
    //                                 values[input.name] = '';
    //                                 return values;
    //                             }

    //                             if(!Array.isArray(values[input.name])) {
    //                                 values[input.name] = [];
    //                             } 

    //                             values[input.name].push(input.value);

    //                             break;

    //                         case 'file':
    //                             values[input.name] = input.files;


    //                             break;
    //                         default:
    //                             values[input.name] = input.value;
    //                     }

    //                     return values;
    //                 }, {})



    //                 options.onSubmit(formValues)
    //             } else {
    //                 formElement.submit();
    //             }
    //         }
    //     }


    //     // xử lý lặp qua rule
    //     options.rules.forEach(function (rule) {

    //         //lưu lại rules
    //         if (Array.isArray(selectorRules[rule.selector])) {
    //             selectorRules[rule.selector].push(rule.test); // đã tồn tại mảng =>> push rule vào mảng
    //         } else {
    //             selectorRules[rule.selector] = [rule.test]; //chưa tồn tại mảng của key selector =>> tạo một mảng cho key selector

    //         }



    //         var inputElements = formElement.querySelectorAll(rule.selector);
    //         Array.from(inputElements).forEach(function(inputElement) {

    //             inputElement.onblur = function () {
    //                 validate(inputElement, rule)
    //             }

    //             //Xử lý đang nhập
    //             inputElement.oninput = function () {
    //                 var errorElement = getParent(inputElement, options.formGroup).querySelector(options.errorSelector);

    //                 getParent(inputElement, options.formGroup).classList.remove('invalid')
    //                 errorElement.innerText = '';
    //             }
    //         })

    //     })
    // }

    // console.log(selectorRules)


}

//Định nghĩa quy tắc
//sẽ return cho Validator sử dụng
// Rule:
//1. trả ra mess lỗi khi có lỗi
//2. else undefined
Validator.isRequire = function(selector, message) {
    return {
        selector,
        test: function(value) {
            return value ? undefined : message || 'Vui lòng nhập trường này'
        }
    };
}

Validator.isEmail = function(selector, message) {
    return {
        selector,
        test: function(value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'Trường này phải là email'

        }
    };
}

Validator.minLength = function(selector, min, message) {
    return {
        selector,
        test: function(value) {
            return value.length >= min ? undefined : message || `Mật khẩu phải tối thiểu ${min} kí tự.`

        }
    };
}

Validator.isConfirmed = function(selector, getConfirm, message) {
    return {
        selector,
        test: function(value) {
            return value === getConfirm() ? undefined : message || 'Giá trị nhập vào không chính xác';
        }
    }

}