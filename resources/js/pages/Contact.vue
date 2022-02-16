<template>
    <div class="container">
        <h1 class="mb-5 text-center">Contact Us</h1>

        <div class="row">
            <div class="col-md-6">
                <h4>Library</h4>
                <div>Lorem ipsum dolor street, 99</div>
                <div>Ipsum, IT</div>
            </div>
            <div class="col-md-6">
                <div v-show="success" class="allert allert-success">
                    Message send successfully
                </div>
                <h2 class="mb-2">Get in tuch with the from below</h2>
                    <!-- Prevent the refresh the page -->
                <form @submit.prevent="libraryForm">
                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" type="text" id="name"  v-model="name">
                        <!-- Name error message -->
                        <div
                            v-for="(error, index) in errors.name" 
                            :key="`error-name-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="text" id="email"  v-model="email">
                        <!-- Email error message -->
                        <div
                            v-for="(error, index) in errors.email" 
                            :key="`error-email-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                        <label class="form-label" for="message">Message</label>
                        <textarea class="form-control" id="message" cols="30" rows="8" v-model="message"></textarea>
                        <!-- Message error message -->
                        <div
                            v-for="(error, index) in errors.message" 
                            :key="`error-message-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" :disabled="sending">
                        {{ sending ? 'Sending...' : 'Send' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: 'Contact',
    data() {
        return {
            name: '',
            email: '',
            message: '',
            errors: {},
            success: false,
            sending: false,
        }
    },
    methods: {
        libraryForm() {
            this.sending = true;

            axios.post('http://127.0.0.1:8000/api/contacts', {
                name: this.name,
                email: this.email,
                message: this.message,
            })
            .then(res => {
                this.sending = false;

                if(res.data.errors) {
                    this.errors = res.data.errors
                    this.success = false;
                } else {
                    //Fields reset
                    this.name = '';
                    this.email = '';
                    this.message = '';
                    //Error message reset
                    this.errors = {};
                    // Set show true to see a message
                    this.success = true;
                }
            })
            .catch(err => console.log(err));
        }
    },

}
</script>

<style>

</style>