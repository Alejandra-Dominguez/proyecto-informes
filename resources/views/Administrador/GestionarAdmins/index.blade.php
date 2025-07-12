<x-app-layout>

    <div class="max-w-6xl mx-auto mt-10">

        <!-- Botón Agregar Administradores -->
        <div class="flex justify-center mb-6">
            <button
                data-modal-target="add-user-modal"
                data-modal-toggle="add-user-modal"
                class="px-6 py-2 rounded-md font-semibold text-gray-900 shadow-md"
                style="background-color: #FFC436;">
                Agregar Administradores
            </button>
        </div>

        <!-- Tabla -->
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table id="search-table" class="min-w-full text-gray-800 bg-gray-200">
                <thead style="background-color: #004CBE;" class="text-xs uppercase text-white">
                    <tr>
                        <th class="px-6 py-3">N° Cuenta</th>
                        <th class="px-6 py-3">Nombre</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Contraseña</th>
                        <th class="px-6 py-3">Rol</th>
                        <th class="px-6 py-3">Facultad</th>
                        <th class="px-6 py-3">Campus</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse($admins as $admin)
                        <tr>
                            <td class="px-6 py-4">{{ $admin->numero_cuenta }}</td>
                            <td class="px-6 py-4 font-medium">{{ $admin->name }}</td>
                            <td class="px-6 py-4">{{ $admin->email }}</td>
                            <td class="px-6 py-4">••••••••</td> 
                            <td class="px-6 py-4">{{ $admin->role }}</td>
                            <td class="px-6 py-4">{{ $admin->facultad }}</td>
                            <td class="px-6 py-4">{{ $admin->campus }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('admins.show', $admin->id) }}" class="text-yellow-600 hover:text-yellow-800" title="Ver usuario">👁️</a>
                                <a href="#" class="text-blue-600 hover:text-blue-800" title="Editar">✏️</a>
                                <a href="#" class="text-red-600 hover:text-red-800" title="Eliminar">🗑️</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                No hay administradores registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="add-user-modal" tabindex="-1" aria-hidden="true" 
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 
                justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Agregar Administrador
                    </h3>
                    <button type="button" 
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 
                               rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center 
                               dark:hover:bg-gray-600 dark:hover:text-white" 
                        data-modal-hide="add-user-modal">
                        ✖️
                        <span class="sr-only">Cerrar modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-4">
                    <form class="space-y-4" action="{{ route('GestionarAdmins.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">N° Identidad</label>
                                <input name="numero_cuenta" placeholder="1807200400380 (sin guiones)" type="text" 
                                       class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5
                                              dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input name="name" placeholder="Ingrese Nombre Completo" type="text" 
                                       class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5
                                              dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input name="email" placeholder="ejemplo@unicah.edu" type="email" 
                                       class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5
                                              dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                                <input name="password" placeholder="Mínimo 6 Caracteres" type="password" 
                                       class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5
                                              dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                            </div>
                            <!-- Removí el campo role porque se asigna automáticamente como 'admin' -->
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Facultad</label>
                                <select name="facultad" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5
                                               dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                                    <option value="">Seleccione una Facultad</option>
                                    <option>Arquitectura</option>
                                    <option>Ciencias de la Comunicación</option>
                                    <option>Cirugía Dental</option>
                                    <option>Derecho</option>
                                    <option>Enfermería</option>
                                    <option>Finanzas</option>
                                    <option>Gestión Estratégica de Empresas</option>
                                    <option>Ingeniería Civil</option>
                                    <option>Ingeniería en Ciencias de la Computación</option>
                                    <option>Ingeniería Industrial</option>
                                    <option>Ingeniería Ambiental</option>
                                    <option>Medicina y Cirugía</option>
                                    <option>Mercadotecnia</option>
                                    <option>Nutrición</option>
                                    <option>Psicología</option>
                                    <option>Relaciones Internacionales</option>
                                    <option>Teología</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mt-4">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Campus</label>
                                <select name="campus" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5
                                               dark:bg-gray-600 dark:border-gray-500 dark:text-white" required>
                                    <option value="">Seleccione un Campus</option>
                                    <option>Sagrado Corazón de Jesús</option>
                                    <option>San Pedro y San Pablo</option>
                                    <option>Jesús Sacramentado</option>
                                    <option>San Jorge</option>
                                    <option>San Isidro</option>
                                    <option>Santa Rosa de Lima</option>
                                    <option>Santa Clara</option>
                                    <option>Espiritual El Tabor</option>
                                    <option>Santiago Apostol</option>
                                    <option>San Juan Bautista</option>
                                    <option>Dios Espíritu Santo</option>
                                </select>
                            </div>
                            <div class="flex space-x-3">
                                <button type="button" data-modal-hide="add-user-modal"
                                        class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-900">
                                    Cancelar
                                </button>
                                <button type="submit"
                                        class="px-4 py-2 rounded text-gray-900 shadow-md"
                                        style="background-color: #FFC436;">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Margen al buscador de DataTables -->
    <style>
        div.dataTables_filter {
            margin-bottom: 1rem; 
        }
    </style>

</x-app-layout>
