<template>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
      <i class="ion-android-notifications-none"></i>Notifications
    </a>
    <ul class="dropdown-menu" role="menu">
      <li v-for="notification in notifications">
        <small>Admin Telah Mengupdate Orderan anda silahkan cek
        <a href="#" v-on:click="MarkAsRead(notification)">Booking ID {{ notification.data.order.id}}</a></small>
      </li>
      <li v-if="notifications.length == 0">
        There is no Notifications
      </li>
    </ul>
  </li>
</template>

<script>
    export default {
        props: ['notifications'],
        methods : {
          MarkAsRead: function(notification){
            var data = {
              id : notification.id
            };
          axios.post('/notification/read',data).then(response =>{
            window.location.href = "/pembeli/order/detail/"+notification.data.order.id;
          });
}
        }
    }
</script>
