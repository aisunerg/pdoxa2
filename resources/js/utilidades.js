/*  
    busca en un array de objetos el que tenga una 
    propiedad "id" igual al parametro del mismo nombre 
    y retorna la propiedad "name" del objeto que coincida
*/
export const selectObj = (id, array) => {
    let val = array.find(e => e.id === id);
    return (val) ? val.name: null;
}

export const selectAll = (id, array) => {
    let val = array.find(e => e.id === id);
    (val) ? val: null;
    return val.name+" "+val.lastname
}

//envia un formulario a una ruta que recibe post
export function store(link, form) {
    form.post(route(link));
}

export function relaciona (teachsecs, section_id, teachers){
    let tea_sec = teachsecs.find(e => e.section_id == section_id );
    let teacher = teachers.find(e => e.id == tea_sec.teacher_id);
    return teacher.name+" "+teacher.lastname;
}

export function relShiftHour (shifthour, hour_id, shifts){
    let shi_hou = shifthour.find(e => e.hour_id == hour_id );
    let shift = shifts.find(e => e.id == shi_hou.shift_id);
    return shift.name;
}