
document.addEventListener("DOMContentLoaded",function(){
	if(document.getElementById("aside_nav") !=null){
		setUl('aside_nav');
	}
	if(document.getElementById("parent-type") != null){
		var select_element = document.getElementById("parent-type");
		registration_parent_change(select_element);
	}
	if(document.getElementById("already-have-account") !=null){
		already_have_parent_account(document.getElementById("already-have-account"),'parent-details-wrapper','parent-account-field')
	}
});


var aside_toggle_buttons = document.getElementsByClassName("aside-toggle-button");
var i=0;
for(; i < aside_toggle_buttons.length; i++){
	aside_toggle_buttons[i].addEventListener("click",collapseToggle);
}

// aside navbar togglers
function collapseToggle(){
	target = document.getElementById(this.getAttribute("target"));
	if(target.classList.contains('no-collapsed')){
		this.parentElement.classList.remove("col-1");
		this.parentElement.classList.add("col-5");
		document.getElementById("content").classList.add("col-7");
		document.getElementById("content").classList.remove("col-11");
		target.classList.add("collapsed");
		target.classList.remove("no-collapsed");
		this.getElementsByTagName("img")[0].src="../img/open-menu.png";
	}else{
		this.parentElement.classList.remove("col-5");
		this.parentElement.classList.add("col-1");
		document.getElementById("content").classList.remove("col-7");
		document.getElementById("content").classList.add("col-11");
		target.classList.add("no-collapsed");
		target.classList.remove("collapsed");
		this.getElementsByTagName("img")[0].src="../img/close-menu.png";
	}
}

function registration_parent_change(select_element){

	var x = document.getElementsByClassName("collapsed")[0];
	x.classList.add('no-collapsed');
	x.classList.remove('collapsed');

	var inputs = x.getElementsByTagName('input');
	for(var i=0; i<inputs.length;i++){
		if(inputs[i].hasAttribute("required")){
			inputs[i].removeAttribute("required");
			inputs[i].setAttribute("value","");
		}
	}

	if(select_element.value == "father"){
		var father = document.getElementById("father");
		father.classList.add("collapsed");

		var inputs = father.getElementsByTagName('input');
		for(var i=0; i<inputs.length;i++){
			if(!inputs[i].hasAttribute("required")){
				inputs[i].setAttribute("required","required");
			}
		}

		if(father.classList.contains("no-collapsed")){
			document.getElementById("father").classList.remove("no-collapsed");
		}
	}else if(select_element.value == "mother"){
		var mother = document.getElementById("mother");
		mother.classList.add("collapsed");

		var inputs = mother.getElementsByTagName('input');
		for(var i=0; i<inputs.length;i++){
			if(!inputs[i].hasAttribute("required")){
				inputs[i].setAttribute("required","required");
			}
		}

		if(mother.classList.contains("no-collapsed")){
			document.getElementById("mother").classList.remove("no-collapsed");
		}
	}else{
		var guardian = document.getElementById("guardian");
		guardian.classList.add("collapsed");

		var inputs = guardian.getElementsByTagName('input');
		for(var i=0; i<inputs.length;i++){
			if(!inputs[i].hasAttribute("required")){
				inputs[i].setAttribute("required","required");
			}
		}

		if(guardian.classList.contains("no-collapsed")){
			document.getElementById("guardian").classList.remove("no-collapsed");
		}
	}
}


function already_have_parent_account(checkbox,wrapper_name,acc_input_name){
	var acc_input = document.getElementById(acc_input_name);
	var wrapper = document.getElementById(wrapper_name);

	var inputs = wrapper.getElementsByTagName('input');
	var select = wrapper.getElementsByTagName('select');
	if(checkbox.checked){
		acc_input.classList.add("collapsed");
		acc_input.classList.remove("no-collapsed");
		acc_input.setAttribute("required","required");

		//this not affect to view page
		if(window.location.href.search("view") < 0){
			for(var i=0; i<inputs.length; i++){
				inputs[i].setAttribute("disabled","disabled");
			}
			select[0].setAttribute("disabled","disabled");
		}
	}else{
		acc_input.classList.add("no-collapsed");
		acc_input.classList.remove("collapsed");
		acc_input.removeAttribute("required");

		//this not affect to view page
		if(window.location.href.search("view") < 0){
			for(var i=0; i<inputs.length; i++){
				inputs[i].removeAttribute("disabled");
			}
			select[0].removeAttribute("disabled");
		}
	}
}

var form_errors = new Array();

function validate_birthday(element,padding){
	var bday = element.value;
	var submit = document.getElementById("submit");
    var regex = /(((19|20)\d\d)-(0[1-9]|1[0-2])-((0|1)[0-9]|2[0-9]|3[0-1]))$/;
    var next_element = element.nextSibling;
    if(next_element.nodeName == "#text"){
	    var next_element = next_element.nextSibling;
	}
    if(regex.test(bday)){
    	var parts = bday.split("-");
    	var bday_obj = new Date(bday);
    	var current_date = new Date();
    	if(current_date.getFullYear() - bday_obj.getFullYear() < padding){
    		if(next_element.nodeName == "LABEL"){
    			form_errors["birthday"] = true;
    			next_element.style.display = "inherit";
    			next_element.innerHTML = "Birthday must be before year " + (current_date.getFullYear() - padding +1);
    			submit.setAttribute("disabled","disabled");
    			submit.style.background = "gray";
    		}
    	}
    	else{
    		if(next_element.nodeName == "LABEL"){
    			next_element.style.display = "none";
	    		next_element.innerHTML = "";
	    		delete form_errors['birthday'];
    			// form_errors.splice('birthday',1);
	    		if (Object.keys(form_errors).length == 0) {
		    		submit.removeAttribute("disabled");
		    		submit.removeAttribute("style");
		    	}
	    	}
    	}
    }
}

function validate_contact_number(element){
	var next_element = element.nextSibling;
	var submit = document.getElementById("submit");
    if(next_element.nodeName == "#text"){
	    var next_element = next_element.nextSibling;
	}
	if(isNaN(element.value)){
		if(next_element.nodeName == "LABEL"){
			next_element.style.display = "inherit";
			next_element.innerHTML = "Contact number must numbers.<br>";
			submit.setAttribute("disabled","disabled");
			submit.style.background = "gray";
			form_errors["contact_number"] = true;
		}
	}else{
		var regex = /(0(70|71|72|75|76|77|78))+/;
		if(!regex.test(element.value) && element.value.length >2){
			if(next_element.nodeName == "LABEL"){
				next_element.style.display = "inherit";
	    		next_element.innerHTML = "Contact number must begin with 070, 071, 072, 075, 076, 077 or 078. <br>";
				submit.setAttribute("disabled","disabled");
				submit.style.background = "gray";
				form_errors["contact_number"] = true;
			}
		}else{
			if(next_element.nodeName == "LABEL"){
	    		next_element.innerHTML = "";
				next_element.style.display = "none";
				delete form_errors['contact_number'];
				// form_errors.splice('contact_number',1);
				if (Object.keys(form_errors).length == 0) {
					submit.removeAttribute("disabled");
					submit.removeAttribute("style");
				}
			}
		check_length_constraint(element,10);
		}
	}
}

function check_length_constraint(element,len){
	var next_element = element.nextSibling;
	var submit = document.getElementById("submit");
    if(next_element.nodeName == "#text"){
	    var next_element = next_element.nextSibling;
	}
	if(element.value.length != len){
		if(next_element.nodeName == "LABEL"){
			next_element.style.display = "inherit";
			next_element.innerHTML = element.getAttribute("placeholder") + " must be " + len + " characters.<br>";
			submit.setAttribute("disabled","disabled");
			submit.style.background = "gray";
			form_errors["contact_number"] = true;
		}
	}else{
		if(next_element.nodeName == "LABEL"){
			next_element.style.display = "none";
			next_element.innerHTML = "";
			delete form_errors['contact_number'];
			// form_errors.splice('contact_number',1);
			if (Object.keys(form_errors).length == 0) {
				submit.removeAttribute("disabled");
				submit.removeAttribute("style");
			}
		}
	}
}

var num=4;

//for interview pannel
function interview_add_teacher(element,target){
	var target = document.getElementById(target);
	element.setAttribute("onclick",`interview_add_teacher(this,'interview-teachers',${num+1})`)
	var html = `<div id="teacherid-${num}" class="form-group">\
					<label for="teacher-${num}">Teacher ID</label>\
					<input type="text" name="teacher-${num}" id="teacher-${num}">\
				<button type="button" class="mt-2 float-right" onclick="removeElement(
				'teacherid-${num}')" required="required">-remove teacher</button>
				</div>`;
	target.innerHTML = target.innerHTML + html;
}