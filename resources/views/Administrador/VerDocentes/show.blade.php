<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-start justify-center py-10">
        <div class="w-full md:w-4/5 lg:w-3/4 bg-white rounded-lg shadow p-6">
            <!-- Sección: Información de Usuario -->
            <div class="border border-gray-300 rounded-lg p-6 mb-6 bg-white">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm"><strong>Nombre:</strong> {{ $docente->name }}</p>
                        <p class="text-sm"><strong>Numero de cuenta:</strong> {{ $docente->numero_cuenta }}</p>
                        <p class="text-sm"><strong>Facultad:</strong> {{ $docente->facultad()->first()->nombre ?? 'Sin facultad' }}</p>
                    </div>
                    <div>
                        <p class="text-sm"><strong>Correo electronico:</strong> {{ $docente->email }}</p>
                        <p class="text-sm"><strong>Rol:</strong> Docente</p>
                        <p class="text-sm"><strong>Campus:</strong> {{ $docente->campus()->first()->nombre ?? 'Sin campus' }}</p>
                    </div>
                </div>
            </div>

            <!-- Sección: Última conexión -->
            <div class="flex justify-center mb-6">
                <button class="text-black font-medium rounded-lg text-sm px-5 py-2.5 shadow"
                        style="background-color:#FFC436;">
                    Ultima conexion: 07/07/2025 11:25 pm
                </button>
            </div>

            <!-- Sección inferior: Ternas -->
            <div class="border border-gray-300 rounded-lg p-6 bg-white">
                <p class="text-sm font-medium mb-4" style="color:#004CBE;">Ternas a las que pertenece:</p>
                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                    <p class="text-sm font-semibold mb-2" style="color:#004CBE;">Terna #1</p>
                    <p class="text-sm mb-4">Alumno: Juan Orlando Hernandez</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="bg-white p-3 rounded-lg shadow border border-gray-200">
                            <p class="text-sm font-semibold">Docente #1:</p>
                            <p class="text-sm">Nelson Martinez</p>
                        </div>
                        <div class="bg-white p-3 rounded-lg shadow border border-gray-200">
                            <p class="text-sm font-semibold">Docente #2:</p>
                            <p class="text-sm">Emilio Rodriguez</p>
                        </div>
                        <div class="bg-white p-3 rounded-lg shadow border border-gray-200">
                            <p class="text-sm font-semibold">Docente #3:</p>
                            <p class="text-sm">Juan Hernandez</p>
                        </div>
                        <div class="bg-white p-3 rounded-lg shadow border border-gray-200">
                            <p class="text-sm font-semibold">Docente #4:</p>
                            <p class="text-sm">Martha Perez</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
