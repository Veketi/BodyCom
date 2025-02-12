<template>
    <header class="bg-white">
        <nav class="flex justify-between item-center w-[92%] mx-auto">
            <div>
                <h1 class=" text-4xl font-bold py-4">BodyCom</h1>
            </div>
            <div class="">
                <ul class="flex items-center gap-[4vw] py-4">
                    <li>
                        <Link class="hover:text-gray-500" href="/">Home</Link>
                    </li>
                    <li>
                        <Link class="hover:text-gray-500" href="/tabela">Tabela</Link>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="flex items-center gap-[4vw] py-4">
                    <li>
                        <Link class="hover:text-gray-500" href="/logout">Logout</Link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
    export default{
        name: 'Header'
    }
</script>