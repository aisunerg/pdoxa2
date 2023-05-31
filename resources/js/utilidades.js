export const selectObj = (id, array) => {
    let val = array.find(e => e.id === id);
    return (val) ? val.name: null;
}

export const selectAll = (id, array) => {
    let val = array.find(e => e.id === id);
    (val) ? val: null;
    return val.name+" "+val.lastname
}

export function store(link, form) {
    form.post(route(link));
}

export function relaciona (teachsecs, section_id, teachers){
    let tea_sec = teachsecs.find(e => e.section_id == section_id );
    let teacher = teachers.find(e => e.id == tea_sec.teacher_id);
    return teacher.name+" "+teacher.lastname;
}