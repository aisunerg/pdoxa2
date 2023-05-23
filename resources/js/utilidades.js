
export const selectObj = (id, array) => {
    let val = array.find(e => e.id === id);
    return (val) ? val.name: null;
}
