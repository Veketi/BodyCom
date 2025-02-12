<template>
<Header></Header>
<div class="flex items-start min-h-screen justify-center bg-gray-200 py-8 space-y-8">
    <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0 mt-0">
        <div class="flex flex-col justify-center p-4 md:p-14">
            <h1 class="mb-3 text-4xl font-bold">Tabela</h1>
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">IMC</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Gordura</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Data</th>
                    </tr>
                </thead>
                <tr v-for="imc in imcs">
                    <td class="p-3 text-sm text-gray-700">{{ imc.imc.toFixed(2) }}</td>
                    <td class="p-3 text-sm text-gray-700">{{ imc.gordura.toFixed(2) }}</td>
                    <td class="p-3 text-sm text-gray-700">{{ imc.status }}</td>
                    <td class="p-3 text-sm text-gray-700">{{ new Date(imc.created_at).toLocaleDateString("pt-BR", options) }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        imcs: {
            type: Array,
            default: () => ([]),
        },
        id:{
            type: Array,
            default: () => ([]),
        }
    },
}
let options = {day: 'numeric', month: 'numeric', year: 'numeric'}
</script>