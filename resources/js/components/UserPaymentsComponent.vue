<template>
    <div>
        <h1 style="text-align: center">Платежи пользователя {{ this.userItem.name }}</h1>
        <table style="margin: auto; width: 1000px" class="table">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Сумма</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
                <Payment
                    v-for="payment in payments"
                    :key="payment.id"
                    :payment="payment"
                    @reloadAfterDeleting="reload"
                />


            </tbody>
        </table>
        <br>
        <div style="width: 1000px; margin: auto">

            <a href="/users" class="send btn btn-primary">Назад</a>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Payment from './PaymentItem'

export default {
    components: {
        Payment
    },
    props: {
        user: {
            type: Object,
            required: false
        }
    },
    data: function () {
        return {
            userItem: {},
            payments: []
        }
    },
    methods: {
        reload() {
            window.location.href = '/users/' + this.userItem.id + '/payments'
        }
    },
    mounted() {
        this.userItem = JSON.parse(this.user)
        this.payments = this.userItem.payments
        console.log(this.payments)
    }
};
</script>
