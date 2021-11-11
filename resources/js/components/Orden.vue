<template>
    <div>
        <div>
            <p>Equipo: {{orden.equipo}}</p>
            <p>Codigo: {{orden.codigo}}</p>
            <p>Frecuencia: {{orden.frecuencia}}</p>
            <p>Mes: {{orden.mes}}</p>
            <p>Hora inicial: {{orden.horaInicial}}</p>
            <p>Hora final: {{orden.horaFinal}}</p>
            <p>Tiempo total: {{orden.tiempoTotal}}</p>
            <p>Actividad: {{orden.actividades}}</p>
        </div>
        <div>
            <a href="/serviciomantenimiento/public/home">
                <button class="btn btn-secondary">
                    Generar PDF
                </button>
            </a>
            <a href="/serviciomantenimiento/public/home">
                <button class="btn btn-secondary">
                    Regresar
                </button>
            </a>
        </div>
    </div>
</template>

<script>
export default{
    props:['orden'],
    data() {
        return {
        }
    },
    methods:{
        
    }
}
</script>

<style>

</style>