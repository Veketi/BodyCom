
<template>
<div id="app"class="flex items-center justify-center min-h-screen bg-gray-200">
     <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
        <div class="flex flex-col justify-center p-4 md:p-14">
            <h1 class="mb-3 text-4xl font-bold">Cadastro</h1>
            <p class="font-light text-gray-400 mb-8">Insira seus dados para criar uma conta e acessar a calculadora.</p>
            <form
            @submit.prevent="form.post('/signup-submit')" 
            action="" 
            method="POST"
            novalidate
            >
            <input type="hidden" name="_token" :value="form.csrf_token">
                <div class="py-2">
                <label for="nome" class="mb-2 font-bold text-md">Nome Completo:</label>
                <input
                    v-model="form.name"
                    type="text" 
                    id="name"
                    class="w-full p2 border border-gray-300 rounded-md placeholder:fomt-light placeholder:text-gray-500"
                    placeholder="Digite seu nome completo" 
                />
            </div>
            <div v-if="form.errors?.name" class="text-red-500" >{{ form.errors.name }}</div>
                <div class="py-2">
                <label for="email" class="mb-2 font-bold text-md">Email:</label>
                <input 
                    v-model="form.email"
                    type="email" 
                    id="email"
                    class="w-full p2 border border-gray-300 rounded-md placeholder:fomt-light placeholder:text-gray-500"
                    placeholder="Digite seu email" 
                />
                <div v-if="form.errors?.email" class="text-red-500">{{ form.errors.email }}</div>
            </div>
                <div class="py-2">
                <label for="senha" class="mb-2 font-bold text-md">Senha:</label>
                <input 
                    v-model="form.password"
                    type="password" 
                    id="password"
                    class="w-full p2 border border-gray-300 rounded-md placeholder:fomt-light placeholder:text-gray-500"
                    placeholder="Digite sua senha" 
                />
                <div v-if="form.errors?.password" class="text-red-500">{{ form.errors.password }}</div>
            </div>
                <div class="py-2">
                <label for="confirmacaoSenha" class="mb-2 font-bold text-md">Confirmação de Senha:</label>
                <input 
                    v-model="form.password_confirmation"   
                    type="password" 
                    id="password_confirmation" 
                    required
                    class="w-full p2 border border-gray-300 rounded-md placeholder:fomt-light placeholder:text-gray-500"
                    placeholder="Confirme sua senha" 
                />
                <div v-if="form.errors?.password" class="text-red-500">{{ form.errors.password }}</div>
            </div>
            <div v-if="loginError" class="text-red-500">{{ loginError }}</div>
                <div class="py-4">
                    <button type="submit" class="w-full bg-black text-white p-2 rounded-lg mb-6 hover:bg-white hover:text-black hover:border hover:border-gray-300">Cadastrar</button>
                </div>
            </form>
            <Link href="/login" class="font-bold text-md">Logar-se</Link> 
        </div>  
    </div>
</div>
</template>
<script>
    export default{
    data(){
        return {
            form: this.$inertia.form({
                name: '',  
                email: '',
                password: '',
                password_confirmation: '',
            })
        }
    },
    props: { 
        loginError: String, 
    },
  }

</script>