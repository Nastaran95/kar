function validateForm_karfarma(){
    flag = false;
    if(document.getElementById('company_farma').value.length==0){
        $("#company_farma").addClass('colorBorder');
        flag=true;
    }else{
        $("#company_farma").removeClass('colorBorder');
    }

    if(document.getElementById('subject_farma').value.length==0){
        $("#subject_farma").addClass('colorBorder');
        flag=true;
    }else{
        $("#subject_farma").removeClass('colorBorder');
    }

    if(document.getElementById('mail_farma').value.length==0){
        $("#mail_farma").addClass('colorBorder');
        flag=true;
    }else{
        $("#mail_farma").removeClass('colorBorder');
    }

    if(document.getElementById('matn_farma').value.length==0){
        $("#matn_farma").addClass('colorBorder');
        flag=true;
    }else{
        $("#matn_farma").removeClass('colorBorder');
    }

    if(flag){
        $(".karfarma_register").removeClass('hide');
    }
    return !flag;
}

function validateForm_karjoo(){
    flag = false;
    if(document.getElementById('name_joo').value.length==0){
        $("#name_joo").addClass('colorBorder');
        flag=true;
    }else{
        $("#name_joo").removeClass('colorBorder');
    }

    if(document.getElementById('azmun_joo').value.length==0){
        $("#azmun_joo").addClass('colorBorder');
        flag=true;
    }else{
        $("#azmun_joo").removeClass('colorBorder');
    }

    if(document.getElementById('mail_joo').value.length==0){
        $("#mail_joo").addClass('colorBorder');
        flag=true;
    }else{
        $("#mail_joo").removeClass('colorBorder');
    }

    if(document.getElementById('matn_joo').value.length==0){
        $("#matn_joo").addClass('colorBorder');
        flag=true;
    }else{
        $("#matn_joo").removeClass('colorBorder');
    }

    if(flag){
        $(".karjoo_register").removeClass('hide');
    }
    return !flag;
}