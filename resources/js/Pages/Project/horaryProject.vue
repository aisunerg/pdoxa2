<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';
    import horaryCell from '@/Components/myComponents/horaryCell.vue'
    import { computed, ref } from 'vue';

    const props = defineProps({
        project: {
            type: Object,
            default: null
        },
        subjects: {
            type: Object,
            default: null
        },
        sections: {
            type: Object,
            default: null
        },
        blocks: {
            type: Object,
            default: null
        },

    });

    console.log(props.blocks);

    let semestres = [1,2,3,4,5,6,7,8,9,10];
    let secNames = (semester) => {
        let sec = props.sections.filter(section => section.subject.level == semester).map(section => section.name);

        var secUnicos = [];

        for (var i = 0; i < sec.length; i++) {
            if (!secUnicos.includes(sec[i])) {
            secUnicos.push(sec[i]);
            }
        }

        return secUnicos.sort((a,b) => {
            var nombreA = a.toUpperCase();
            var nombreB = b.toUpperCase();

            if (nombreA < nombreB) {
                return -1;
            }
            if (nombreA > nombreB) {
                return 1;
            }

            // los nombres son iguales
            return 0;
        })
    }

    let nameSections = ref(null);
    let secName = (ref(null));
    let semester = ref(null);

    const sectionFilter = (name, semester) => {
        let subjectF = props.subjects.filter(e => e.level === semester).sort((a,b) => {
            var nombreA = a.name.toUpperCase();
            var nombreB = b.name.toUpperCase();
            if (nombreA < nombreB) { return -1; }
            if (nombreA > nombreB) { return  1; }
            return 0;
        });

        let sec = props.sections.filter( section => section.name == name && section.subject.level == semester);
        let ordSec = sec.sort((a,b) => {
            var nombreA = a.subject.name.toUpperCase();
            var nombreB = b.subject.name.toUpperCase();
            if (nombreA < nombreB) { return -1; }
            if (nombreA > nombreB) { return  1; }
            return 0;
        });

        let finalSec = [];
        for (let i = 0; i < subjectF.length; i++) {
            let secS = ordSec.find(sec => sec.subject.id == subjectF[i].id)

            if (secS != undefined) {
                finalSec.push(secS)
            }else{
                finalSec.push(null)
            }
            
        }
        return finalSec;
    }

    function porNombres(name, semestre) {
        console.log('me llamaste ');
        secName.value = name;
        semester.value = semestre;        
        return ;
    }
</script>

<template>
  <Head title="MiDashBoard"/>
  <MyLayout :project="project">
    <template #header>
      <div class="" >
        Ver {{ $page.props.sProject.name }}
      </div>
    </template>
    <div class="border-b-2 border-black shadow-none mb-2"></div>

    <div class="overflow-auto w-full" style="height: 83%;">
        <div v-for="semestre in semestres" :key="semestre">
            <!-- <div class="flex justify-end mr-5 relative"><div class="absolute bottom-0 left-0">PDF de Semestre-{{ semestre }}</div></div> -->
            <table class="w-full whitespace-no-wrap" :id="'semestre-'+semestre">
                <thead>
                    <tr class="bg-white rounded-t-lg"><!-- Encabezado -->
                        <td colspan="9">    
                            <div id="" class="flex flex-row">
                                <div id="inline "><img src="/img/unerg.png" alt="logo UNERG" class="w-24"></div>
                                <div id="inline mx-2">
                                    <span class="block font-bold text-xs">Universidad Nacional Experimental Rómulo Gallegos</span>
                                    <span class="block font-bold text-xs">Area de Ingeniería de Sistémas</span>
                                    <span class="block font-bold text-xs">Programa: Ingeniería en Informática</span>
                                    <span class="block font-bold text-xs">Lapso Académico: 2016-1</span>
                                    <span class="block font-bold text-xs">Comisión de Horarios Académicos</span>
                                </div>
                            </div>
                        </td>
                    </tr>
    
                    <tr class="border-2"><!-- Titulo -->
                        <td colspan="9">
                            <span class="block text-center font-bold">Resumen de Horarios Semanales</span>
                            <span class="block text-center font-bold">{{ semestre }}° Semestre</span>
                        </td>
                    </tr>
    
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3 border-2 text-black font-extrabold" width="5%" >Sección</th>
    
                        <th class="text-center px-4 py-3 border-2 text-black" width="14%" v-for="subject in subjects.filter(e => e.level === semestre)" >
                            <span class="" style="display: inline;">{{subject.name}}</span>
                        </th>                  
                    </tr>
                </thead>
                            
                <tbody>
                    <tr v-for="secName in secNames(semestre)" class="bg-white">
                        
                        
                        <td class="text-center border-2 text-4xl">{{ secName }}</td>
    
                        <horaryCell v-for="section in sectionFilter(secName, semestre)" class="border-2" :section="section" :blocks="blocks"/>
                            
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>     
  </MyLayout>
    
    
</template>