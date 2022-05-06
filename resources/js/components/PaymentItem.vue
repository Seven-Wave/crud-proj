<template>
    <tr>
        <td>{{ paymentItem.created_at }}</td>
        <td>{{ paymentItem.operation_sum }} ₽</td>
        <td>
            <a v-on:click="deletePayment" class="btn-sm btn-danger" href="#">Удалить</a>
        </td>
    </tr>
</template>

<script>
import axios from "axios";

export default {
    name: "PaymentItem",
    props: {
        payment: {
            type: Object,
            required: true
        }
    },
    methods: {
        deletePayment(event) {
            event.preventDefault()
            Swal.fire({
                title: 'Вы уверены что хотите удалить платёж?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Да',
                denyButtonText: `Отмена`,
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('/users/payment/delete', {
                        id: this.paymentItem.id
                    })
                    .then(res => {
                        console.log(res)
                        if (res.data.status === 'ok') {
                            Swal.fire('Платёж удалён!', '', 'success')
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        this.$emit('reloadAfterDeleting')
                                    }
                                })

                        } else {
                            Swal.fire('Ошибка!', '', 'error')
                        }
                    })
                }
            })
        }
    },
    data: function () {
        return {
            paymentItem: {}
        }
    },
    mounted() {
        this.paymentItem = this.payment
    }
}
</script>

<style scoped>

</style>
