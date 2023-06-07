<script setup>
import Board from '@/Components/myComponents/Board.vue';
import Card from '@/Components/myComponents/Card.vue';
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head, Link } from '@inertiajs/vue3';


</script>

<template>
    <Head title="Welcome" />
    <Suspense>
        <MyLayout>
            <div class="flex flex-row h-full gap-3">
                <Board id="board-1" >
                    <Card id="card-1" draggable="true">
                        <p>Tarjeta 1</p>
                    </Card>
                </Board>
                <Board id="board-2" >
                    <Card id="card-2" draggable="true">
                        <p>Tarjeta 2</p>
                    </Card>
                </Board>
            </div>
            
        </MyLayout>
    </Suspense>
    
</template>

<style>

</style>
