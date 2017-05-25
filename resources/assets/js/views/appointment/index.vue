<template>

    <data-viewer :source="source" :thead="thead" :filter="filter" :create="create" :title="title">
    <template scope="props">
        <tr @click="$router.push('/appointment/'+ props.item.id)">
        <td> {{props.item.id}} </td>
        <td> {{props.item.sns}} </td>
        <td> {{props.item.name}} </td>
        <td> {{props.item.data}} </td>
        <td> {{props.item.especialidade}} </td>
        <td> {{props.item.user.name}} </td>
        <td> {{props.item.realizada}} </td>
        <td> {{props.item.created_at}} </td>
        </tr>
    </template>
    
    </data-viewer>
</template>
<script>
    import DataViewer from '../../components/DataViewer.vue'

    export default {
        name: 'AppointmentIndex',
        data(){
            return {
                title: 'Appointments',
                source: '/api/appointment',
                thead: [
                    {title: 'ID', key: 'id', sort: true},
                    {title: 'SNS', key: 'sns', sort: true},
                    {title: 'Name', key: 'name', sort: true},
                    {title: 'Date', key: 'data', sort: true},
                    {title: 'Proficiency', key: 'especialidade', sort: true},
                    {title: 'Doctor', key: 'user', sort: true},
                    {title: 'State', key: 'realizada', sort: true},
                    {title: 'Created At', key: 'created_at', sort: true}
                ],
                filter: [
                    'id', 'sns', 'data', 'especialidade', 'user_id', 'realizada', 'created_at',
                    'user.id', 'user.name', 'user.email', 'user.especialidade', 'user.seg_social', 'user.hora_in', 'user.hora_out'
                ]
                }
            },

            components: {
                DataViewer

            }
        }
    
</script>