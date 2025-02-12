<template>
    <Header></Header>
    <!-- Texto Introdutório -->
    <div class="flex items-start justify-center bg-gray-200 py-8 space-y-8">
        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0 mt-0">
          <div class="flex flex-col justify-center p-4 md:p-14">
            <h1 class="mb-3 text-4xl font-bold">Saúde e Bem-Estar: Entenda o IMC e o Percentual de Gordura</h1>
            <p class="font-light text-gray-400 mb-4">
              O <bold class="font-bold">Índice de Massa Corporal (IMC)</bold> é uma medida amplamente utilizada na área de saúde para avaliar
              se o peso de uma pessoa está adequado para sua altura. Essa medida, no entanto, não é perfeita, pois
              não distingue entre gordura, músculo ou distribuição corporal. É por isso que associamos o IMC ao 
              <bold class="font-bold">Percentual de Gordura Corporal (PGC)</bold>, que é uma métrica mais detalhada e personalizada.
            </p>
          </div>
        </div>
      </div>
      

      <!-- Calculadora de IMC -->
      <div class="flex items-start justify-center bg-gray-200 space-y-8">
        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
          <div class="flex flex-col justify-center p-4 md:p-14">
            <h1 class="mb-3 text-4xl font-bold">Calculadora de Saúde</h1>
            <form @submit.prevent="form.post('/')" novalidate>
              <div class="py-2">
                <label for="sexo" class="mb-2 font-bold text-md">Sexo:</label>
                <select v-model="form.sexo" id="sexo" required>
                  <option value="" disabled>Selecione</option>
                  <option value="masculino">Masculino</option>
                  <option value="feminino">Feminino</option>
                </select>
              </div>
              <div v-if="form.errors.sexo" class="text-red-500">{{ form.errors.sexo }}</div>
              <div class="py-2">
                <label for="idade" class="mb-2 font-bold text-md">Idade:</label>
                <input 
                  type="number" 
                  v-model.number="form.idade" 
                  id="idade"
                  class="w-full p2 border border-gray-300 rounded-md placeholder:fomt-light placeholder:text-gray-500"
                  required 
                  placeholder="Ex: 25" 
                />
                <div v-if="form.errors.idade" class="text-red-500">{{ form.errors.idade }}</div>
              </div>
              <div class="py-2">
                <label for="altura" class="mb-2 font-bold text-md">Altura (m):</label>
                <input 
                  type="number" 
                  v-model.number="form.altura" 
                  id="altura"
                  class="w-full p2 border border-gray-300 rounded-md placeholder:fomt-light placeholder:text-gray-500"
                  step="0.01" 
                  required 
                  placeholder="Ex: 1.70" 
                />
                <div v-if="form.errors.altura" class="text-red-500">{{ form.errors.altura }}</div>
              </div>
              <div class="py-2">
                <label for="peso" class="mb-2 font-bold text-md">Peso Atual (kg):</label>
                <input 
                  type="number" 
                  v-model.number="form.peso" 
                  id="peso" 
                  class="w-full p2 border border-gray-300 rounded-md placeholder:fomt-light placeholder:text-gray-500"
                  step="0.1" 
                  required 
                  placeholder="Ex: 70" 
                />
                <div v-if="form.errors.peso" class="text-red-500">{{ form.errors.peso }}</div>
              </div>
              <div>
                <button type="submit" class="w-full bg-black text-white p-2 rounded-lg mb-6 hover:bg-white hover:text-black hover:border hover:border-gray-300">Calcular</button>
              </div>
              
              
            </form>
          </div>
        </div>
      </div>
      <div v-if="resultados"class="flex items-start justify-center min-h-screen bg-gray-200">
        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
          <div class="flex flex-col justify-center p-4 md:p-14">
            <h3 class="mb-3 text-4xl font-bold">Resutados:</h3>
            <p class="font-light text-gray-400 mb-4">IMC: <strong class="font-bold">{{ resultados.imc.toFixed(2) }}</strong> - <strong class="font-bold"> {{  resultados.status }}</strong></p>
            <p class="font-light text-gray-400 mb-4">Percentual de Gordura Corporal: <strong class="font-bold">{{ resultados.gordura.toFixed(2) }}%</strong></p>
            <h3 class="mb-3 text-4xl font-bold">Recomendações</h3>
            <p class="font-light text-gray-400 mb-4">{{ resultados.recomendacao }}</p>
          </div>
        </div>
      </div>
    
    
</template>
<script>
export default {
  data() {
    return {
        form: this.$inertia.form({
            sexo: '',
            idade: '',
            altura: '',
            peso: '',
            imc: '',
            gordura: '',
            status: '',
            recomendacao: '',
            mostrar: false,
        })
    }
  },
  props: {
  resultados: {
    type: Object,
    default: () => ({}) 
  },
},
};
</script>