<template>
    <div>

        <!-- Button to Open the Modal -->
        <button @click="crearOrden()" type="button" class="btn btn-primary my-4">
            Nueva orden
        </button>

        <!-- The Modal -->
        <div class="modal" :class="{mostrar:modal}">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{tituloModal}}</h4>
                    <button @click="cerrarModal()" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container-fluid"> 
                        <div class="row">
                            <!-- <div class="col-6 my-4">
                                <label for="formulario">Codigo formulario</label>
                                <input v-model="orden.formulario" type="text" class="form-control" id="formulario" placeholder="Nombre del formulario">
                                <span class="text-danger" v-if="errores.formulario">{{errores.formulario[0]}}</span>
                            </div> -->
                            <!-- <div class="col-6 my-4">
                                <label for="nombre">Nombre</label>
                                <input v-model="orden.nombre" type="text" class="form-control" id="nombre" placeholder="nombre del equipo">
                                <span class="text-danger" v-if="errores.nombre">{{errores.nombre[0]}}</span>
                            </div> -->
                            <div class="col-6 my-4">
                                <label for="equipo">Equipo</label>
                                <!-- <input v-model="orden.equipo" type="text" class="form-control" id="equipo" placeholder="Nombre del equipo"> -->
                                <div>
                                    <select class="btn btn-primary" v-model="orden.equipo">
                                        <option disabled value="" class="btn-light">Equipo: {{orden.equipo}}</option>
                                        <option class="btn-light" v-for="equipo in equiposBD" :key="equipo.id">{{equipo.equipo}}</option>
                                        <!-- <option class="btn-light">Mensual</option>
                                        <option class="btn-light">Trimestral</option>
                                        <option class="btn-light">Semestreal</option>
                                        <option class="btn-light">Anual</option> -->
                                    </select>
                                </div>
                                <span class="text-danger" v-if="errores.equipo">{{errores.equipo[0]}}</span>
                            </div>
                            <div class="col-6 my-4">
                                <label for="mes">Tipo de mantenimiento</label>
                                <div>
                                    <select class="btn btn-primary" v-model="orden.mantenimiento">
                                        <option disabled value="" class="btn-light">Mantenimiento</option>
                                        <option class="btn-light">Preventivo</option>
                                        <option class="btn-light">Correctivo</option>
                                    </select>
                                </div>
                                <span class="text-danger" v-if="errores.mes">{{errores.mes[0]}}</span>
                            </div>
                            <!-- <div class="col-6 my-4">
                                <label for="codigo">Codigo</label>
                                <input v-model="orden.codigo" type="text" class="form-control" id="codigo" placeholder="Codigo del equipo">
                                <span class="text-danger" v-if="errores.codigo">{{errores.codigo[0]}}</span>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-6 my-4">
                                <label for="frecuencia">Frecuencia</label>
                                <!-- <input v-model="orden.frecuencia" type="text" class="form-control" id="frecuencia" placeholder="Frecuencia"> -->
                                <div>
                                    <select class="btn btn-primary" v-model="orden.frecuencia">
                                        <option disabled value="" class="btn-light">Frecuencia</option>
                                        <option class="btn-light" v-for="frecuencia in frecuenciasBD" :key="frecuencia.id">{{frecuencia.frecuencia}}</option>
                                        <!-- <option class="btn-light">Mensual</option>
                                        <option class="btn-light">Trimestral</option>
                                        <option class="btn-light">Semestreal</option>
                                        <option class="btn-light">Anual</option> -->
                                    </select>
                                </div>
                                <span class="text-danger" v-if="errores.frecuencia">{{errores.frecuencia[0]}}</span>
                            </div>
                            <div class="col-6 my-4">
                                <label for="mes">Mes</label>
                                <div>
                                    <select class="btn btn-primary" v-model="orden.mes">
                                        <option disabled value="" class="btn-light">Mes</option>
                                        <option class="btn-light">Enero</option>
                                        <option class="btn-light">Febrero</option>
                                        <option class="btn-light">Marzo</option>
                                        <option class="btn-light">Abril</option>
                                        <option class="btn-light">Mayo</option>
                                        <option class="btn-light">Junio</option>
                                        <option class="btn-light">Julio</option>
                                        <option class="btn-light">Agosto</option>
                                        <option class="btn-light">Septiembre</option>
                                        <option class="btn-light">Octubre</option>
                                        <option class="btn-light">Noviembre</option>
                                        <option class="btn-light">Diciembre</option>
                                    </select>
                                </div>
                                <span class="text-danger" v-if="errores.mes">{{errores.mes[0]}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 my-4">
                                <label for="horaInicio">Hora inicio</label>
                                <input v-model="orden.horaInicio" type="time" class="form-control" id="horaInicio">
                                <span class="text-danger" v-if="errores.horaInicio">{{errores.horaInicio[0]}}</span>
                            </div>
                            <div class="col-6 my-4">
                                <label for="horaFinal">Hora final</label>
                                <input v-model="orden.horaFinal" type="time" class="form-control" id="horaFinal">
                                <span class="text-danger" v-if="errores.horaFinal">{{errores.horaFinal[0]}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <!-- <div class="col-12 my-4">
                                <label for="actividades">Actividad</label>
                                <input v-model="orden.actividades" type="text" class="form-control" id="actividades" placeholder="Actividad">
                                <span class="text-danger" v-if="errores.actividades">{{errores.actividades[0]}}</span>
                            </div> -->
                            <div class="col-6 my-4">
                                <label for="actividades">Actividades</label>
                                <div v-for="act in actividadesBD" :key="act.id">
                                    <input type="checkbox" :id="act.activida" :value="act.actividad" v-model="actividadesOrden">
                                    <label :for="act.actividad">{{act.actividad}}</label>
                                </div>
                                <span class="text-danger" v-if="errores.actividades">{{errores.actividades[0]}}</span>
                            </div>
                            <div class="col-6 my-4">
                                <label for="materiales">Materiales</label>
                                <div v-for="material in materialesBD" :key="material.id">
                                    <input type="checkbox" :id="material.material" :value="material.material" v-model="materialesOrden">
                                    <label :for="material.material">{{material.material}}</label>
                                    <!-- {{orden.actividades}} -->
                                </div>
                                <span class="text-danger" v-if="errores.materiales">{{errores.materiales[0]}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 my-4">
                                <label for="actividades">Observaciones</label>
                                <textarea v-model="orden.observaciones" cols="50" rows="8"></textarea>
                                <span class="text-danger" v-if="errores.actividades">{{errores.actividades[0]}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- {{orden}}
                    {{actividadesOrden}}
                    {{materialesOrden}} -->
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button @click="guardar()" type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
                    <button @click="cerrarModal()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Codigo Formulario</th>
                <th scope="col">Equipo</th>
                <th scope="col">Frecuencia</th>
                <th scope="col" colspan="2" class="text-center">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="ord in ordenes.data" :key="ord.id">
                    <th scope="row">{{ord.formulario}}</th>
                    <td>{{ord.equipo}}</td>
                    <td>{{ord.frecuencia}}</td>
                    <td>
                        <button class="btn btn-warning" @click="actualizarOrden(ord)">
                            Editar
                        </button>
                    </td>
                    <!-- <td>
                        <button class="btn btn-danger" @click="eliminar(ord.id)">
                            Eliminar
                        </button>
                    </td> -->
                    <td>
                        <!-- <a :href="'/serviciomantenimiento/public/orden/'+ord.id">
                            <button class="btn btn-danger">
                                Ver
                            </button>
                        </a> -->
                        <button class="btn btn-primary" @click="consultarOrden(ord.id)">
                            Consultar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-3 md-3 text-left text-primary">

                Orden {{ordenes.from}} al {{ordenes.to}} de {{ordenes.total}} Ordenes.

            </div>
            <div class="col-2 md-2">

                <select class="form-control" v-model="paginacion.per_page" @change="listar();">
                    <option value="3">3</option>
                    <option value="5">5</option>
                    <option value="7">7</option>
                </select>

            </div>
            <div class="col-7 md-7">

                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{disabled:paginacion.page==1}"><a href="#" class="page-link" @click="paginacion.page=1; listar();">&laquo;</a></li>
                        <li class="page-item" :class="{disabled:paginacion.page==1}"><a href="#" class="page-link" @click="paginacion.page--; listar();">&lt;</a></li>
                        <li class="page-item" v-for="n in paginas" :key="n" :class="{active:paginacion.page==n}"><a href="#" class="page-link" @click="paginacion.page=n; listar();">{{n}}</a></li>
                        <li class="page-item" :class="{disabled:paginacion.page==ordenes.last_page}"><a href="#" class="page-link" @click="paginacion.page++; listar();">&gt;</a></li>
                        <li class="page-item" :class="{disabled:paginacion.page==ordenes.last_page}"><a href="#" class="page-link" @click="paginacion.page=ordenes.last_page; listar();">&raquo;</a></li>
                    </ul>
                </nav>

            </div>
        </div>

        <!-- The Modal Orden-->
        <div class="modal" :class="{mostrar:modalOrden}">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header Orden-->
                <div class="modal-header">
                    <h4 class="modal-title"> Orden </h4>
                    <button @click="cerrarModal()" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body Orden-->
                <div class="modal-body">
                    <div class="container-fluid"> 
                        <div class="row">
                            <div class="col-12">
                                Código del formulario : {{consultarOrdenDato.formulario}}
                            </div>
                            <div class="col-12">
                                Tipo de mantenimiento : {{consultarOrdenDato.mantenimiento}}
                            </div>
                            <!-- <div class="col-12">
                                Nombre : {{consultarOrdenDato.nombre}}
                            </div> -->
                            <div class="col-12">
                                Equipo : {{consultarOrdenDato.equipo}}
                            </div>
                            <div class="col-12">
                                Código del equipo : {{consultarOrdenDato.codigo}}
                            </div>
                            <div class="col-12">
                                Frecuencia : {{consultarOrdenDato.frecuencia}}
                            </div>
                            <div class="col-12">
                                Mes : {{consultarOrdenDato.mes}}
                            </div>
                            <div class="col-12">
                                Hora de inicio : {{consultarOrdenDato.horaInicio}}
                            </div>
                            <div class="col-12">
                                Hora final : {{consultarOrdenDato.horaFinal}}
                            </div>
                            <div class="col-12">
                                Tiempo total : {{consultarOrdenDato.tiempoTotal}}
                            </div>
                            <div class="col-12">
                                Actividad : {{consultarOrdenDato.actividades}}
                            </div>
                            <div class="col-12">
                                Observaciones : {{consultarOrdenDato.observaciones}}
                            </div>
                            <div class="col-12">
                                Materiales : {{consultarOrdenDato.materiales}}
                            </div>
                            <div class="col-12">
                                Fechad de creación : {{consultarOrdenDato.created_at}}
                            </div>
                            <div class="col-12">
                                Fechad de actualización : {{consultarOrdenDato.updated_at}}
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- Modal footer Orden-->
                <div class="modal-footer">
                    <a :href="'/serviciomantenimiento/public/pdf/'+consultarOrdenDato.id">
                        <button class="btn btn-success">Generar PDF</button>
                    </a>
                    <!-- <button @click="generarPDF(consultarOrdenDato.id)" type="button" class="btn btn-success" data-dismiss="modal">Exportar PDF</button> -->
                    <button @click="cerrarModal()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ordenes:[],
                tituloModal:'',
                modal:false,
                modificar:false,
                orden:{
                    formulario:'',
                    mantenimiento:'',
                    equipo:'',
                    codigo:'',
                    frecuencia:'',
                    mes:'',
                    horaInicio:'',
                    horaFinal:'',
                    tiempoTotal:'',
                    actividades:'',
                    observaciones:'',
                    materiales:''
                },
                id:0,
                modalOrden:false,
                consultarOrdenDato:{},
                paginacion:{
                    page:1,
                    per_page:5,
                },
                paginas:[],
                errores:{},
                equiposBD:[],
                frecuenciasBD:[],
                actividadesBD:[],
                materialesBD:[],
                actividadesOrden:[],
                materialesOrden:[],
            }
        },
        methods:{
            async listar(){
                const res = await axios.get('ordenes',{params: this.paginacion});
                this.ordenes = res.data;
                // console.log(this.ordenes);
                const equipoRes = await axios.get('equipos');
                this.equiposBD = equipoRes.data;
                const frecuenciaRes = await axios.get('frecuencias');
                this.frecuenciasBD = frecuenciaRes.data;
                const actividadRes = await axios.get('actividades');
                this.actividadesBD = actividadRes.data;
                const materialRes = await axios.get('materiales');
                this.materialesBD = materialRes.data;
                this.listarPaginas();
            },
            async eliminar(id){
                const res = await axios.delete('ordenes/'+id);
                this.listar();
            },
            crearOrden(){
                this.modal = true;
                // console.log(data.id);
                // console.log('aqui');
                // Si el id es igual o mayor a 1 entonces muestra algo y como
                // sale undefine sino agarro ninguna data entonces si pongo
                // exactamente ese if me saldra crear articulo
                // if(data.id >= 1){
                //     this.id = data.id;
                //     this.modificar = true;
                //     // console.log(this.id);
                //     // console.log(this.modificar);
                //     this.tituloModal="Modificar Orden";
                //     this.orden.formulario = data.formulario;
                //     this.orden.mantenimiento = data.mantenimiento;
                //     this.orden.equipo = data.equipo;
                //     this.orden.codigo = data.codigo;
                //     this.orden.frecuencia = data.frecuencia;
                //     this.orden.mes = data.mes;
                //     this.orden.horaInicio = data.horaInicio;
                //     this.orden.horaFinal = data.horaFinal;
                //     this.orden.tiempoTotal = data.tiempoTotal;
                //     this.orden.actividades = data.actividades;
                //     this.orden.observaciones = data.observaciones;
                //     this.orden.materiales = data.materiales;
                // } else {
                //     // this.id = 0,

                //     this.tituloModal="Crear Orden";
                //         let numero = Math.random(1,999);
                //         let numeron = numero.toString(12);
                //         let numerog = numeron.substr(2,9);
                //         // console.log(numeron)
                //     this.orden.formulario = 'F-GM-GN-' + numerog;
                //     this.orden.mantenimiento = '';
                //     // console.log(this.orden.formulario)
                //     // this.orden.nombre = '';
                //     this.orden.equipo = '';
                //     // console.log(this.orden.equipo);
                //     this.orden.codigo = '26';
                //     this.orden.frecuencia = '';
                //     this.orden.mes = '';
                //     this.orden.horaInicio = '';
                //     this.orden.horaFinal = '';
                //     this.orden.tiempoTotal = 0;
                //     this.orden.actividades = [];
                //     this.orden.observaciones = '';
                //     this.orden.materiales = [];
                // }
                this.modificar = false;
                this.tituloModal="Crear Orden";
                    let numero = Math.random(1,999);
                    let numeron = numero.toString(12);
                    let numerog = numeron.substr(2,9);
                this.orden.formulario = 'F-GM-GN-' + numerog;
                this.orden.mantenimiento = '';
                this.orden.equipo = '';
                this.orden.codigo = '';
                this.orden.frecuencia = '';
                this.orden.mes = '';
                this.orden.horaInicio = '';
                this.orden.horaFinal = '';
                this.orden.tiempoTotal = '';
                this.orden.actividades = '';
                this.orden.observaciones = '';
                this.orden.materiales = '';
                this.actividadesOrden = [];
                this.materialesOrden = [];
            },
            actualizarOrden(data={}){
                this.modal = true
                this.modificar = true;
                this.id = data.id;
                this.modificar = true;
                this.tituloModal="Modificar Orden";
                this.orden.formulario = data.formulario;
                this.orden.mantenimiento = data.mantenimiento;
                this.orden.equipo = data.equipo;
                this.orden.codigo = data.codigo;
                this.orden.frecuencia = data.frecuencia;
                this.orden.mes = data.mes;
                this.orden.horaInicio = data.horaInicio;
                this.orden.horaFinal = data.horaFinal;
                this.orden.tiempoTotal = data.tiempoTotal;
                this.orden.actividades = data.actividades;
                this.orden.observaciones = data.observaciones;
                this.orden.materiales = data.materiales;
                this.buscarActividades();
                this.buscarMateriales();
            },
            cerrarModal(){
                this.modal = false;
                this.modalOrden = false; 
                this.errores={};
            },
            async guardar(){
                try {
                    if(this.modificar){
                        // console.log('llegamos aqui');
                        this.generarActividades();
                        this.generarMateriales();
                        const res = await axios.put('ordenes/'+this.id, this.orden);
                    } else {
                        this.generarHora();
                        // this.generarCodigo();
                        this.buscarCodigo();
                        this.generarActividades();
                        this.generarMateriales();
                        const res = await axios.post('ordenes', this.orden);
                        // console.log(res)
                    }
                    this.cerrarModal();
                    this.listar();
                } catch (error) {
                    if(error.response.data){
                        this.errores = error.response.data.errors
                    }
                }
                // const res = await axios.post('ordenes', this.orden)
            },
            async consultarOrden(id){
                this.modalOrden = true;
                const res = await axios.get('/serviciomantenimiento/public/orden/'+id);
                this.consultarOrdenDato = res.data;
                // console.log(this.consultarOrdenDato);
            },
            listarPaginas(){
                //Para decirle 2 a la izquierda y a la derecha
                const n = 2;
                let arrayN = [];
                let inicio = this.paginacion.page - 2;
                let final = this.paginacion.page + 2;

                if(inicio<1){
                    inicio = 1;
                }

                if(final>this.ordenes.last_page){
                    final = this.ordenes.last_page;
                }

                for(let i = inicio; i <= final; i++){
                    arrayN.push(i);
                }

                this.paginas = arrayN;
            },
            async generarPDF(id){
                // console.log(id);
                const res = await axios.get('/serviciomantenimiento/public/pdf/'+id);
                // console.log(res);
            },
            generarHora(){
                let ultimahora = this.orden.horaFinal.substr(0,3);
                let primerahora = this.orden.horaInicio.substr(0,3);
                let horaF = parseInt(ultimahora);
                let horaI = parseInt(primerahora);
                let totalhora;
                if(horaI > horaF){
                    horaI = 24 - horaI;
                    if(horaI == 24){
                        horaI = 1;
                        totalhora = horaI + horaF;
                    } else {
                        totalhora = horaI + horaF;
                    }
                } else {
                    totalhora = horaF - horaI;
                }
                // console.log(totalhora)
                let ultimominuto = this.orden.horaFinal.substr(3,6);
                let primerminuto = this.orden.horaInicio.substr(3,6);
                let minutoF = parseInt(ultimominuto);
                let minutoI = parseInt(primerminuto);
                let totalminuto;
                if(minutoI > minutoF){
                    totalminuto = (minutoF - minutoI) * (-1);
                } else {
                    totalminuto = minutoF - minutoI;
                }
                this.orden.tiempoTotal = totalhora + ' horas y ' + totalminuto + ' minutos';
            },
            // generarCodigo(){
            //     let numero = Math.random(2,999)
            //     let numeron = numero.toString(12);
            //     let numerog = numeron.substr(2,6);
            //     this.orden.codigo = numerog;
            // },
            buscarCodigo(){
                    // let i;
                    // let j = this.equiposBD.length;
                    // for(i=1;i<=j;i++){
                    //     if(this.equiposBD.equipo[i] == this.orden.equipo){
                    //         this.orden.codigo = this.equiposBD.codigo[i];
                    //     }
                    // }
                let cod = this.orden;
                const funcionQueRecorre = function(equipo){
                    if(equipo.equipo == cod.equipo){
                        // console.log(equipo.equipo)
                        cod.codigo = equipo.codigo
                        // console.log(cod.codigo)
                    }
                }

                this.equiposBD.forEach(funcionQueRecorre);
            },
            generarActividades(){
                this.orden.actividades = this.actividadesOrden.join();
            },
            buscarActividades(){
                this.actividadesOrden = this.orden.actividades.split(',');
            },
            generarMateriales(){
                this.orden.materiales = this.materialesOrden.join();
            },
            buscarMateriales(){
                this.materialesOrden = this.orden.materiales.split(',');
            }
        },
        created() {
            this.listar();
        }
    }
</script>

<style>

.mostrar{
    display:list-item;
    opacity:1;
    background: rgba(44,38,75,0.849);
}

</style>