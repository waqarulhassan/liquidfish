<template>
    <div class="contact-form-wrapper">
        <b-card no-body>
            <b-row no-gutters>
                <b-col class="box" md="4">
                    <h5>Contact Information</h5>
                    <i class="fas fa-facebook-square"></i>
                    <p><i class="fas fa-phone-square-alt"></i> <span class="pl-2">+1 (555) 123-456</span></p>
                    <p><i class="far fa-envelope"></i> <span class="pl-2">support@liquidfish.com</span></p>
                    <i class="fas fa-facebook-square"></i>
                    <ul>
                        <li><i class="fab fa-facebook-square"></i></li>
                        <li><i class="fab fa-twitter"></i></li>
                        <li><i class="fab fa-github"></i></li>
                    </ul>
                </b-col>
                <b-col md="8">
                    <b-card-body>
                        <h4>Send us a message</h4>
                        <b-card-text>
                            <b-form @submit.prevent="onSubmit">
                                <b-row class="col-gutters">
                                    <b-col cols="6">
                                        <div role="group">
                                            <label for="first_name">First Name:</label>
                                            <b-form-input
                                                id="first_name"
                                                size="sm"
                                                v-model="form.first_name"

                                                aria-describedby="input-live-help input-live-feedback"
                                                trim
                                            ></b-form-input>
                                            <b-form-invalid-feedback :state="!form.errors.has('first_name')">
                                                {{ form.errors.get('first_name') }}
                                            </b-form-invalid-feedback>
                                        </div>
                                    </b-col>
                                    <b-col cols="6">
                                        <div role="group">
                                            <label for="last_name">Last Name:</label>
                                            <b-form-input
                                                id="last_name"
                                                v-model="form.last_name"
                                                size="sm"

                                                aria-describedby="input-live-help input-live-feedback"
                                                trim
                                            ></b-form-input>
                                            <b-form-invalid-feedback :state="!form.errors.has('last_name')">
                                                {{ form.errors.get('last_name') }}
                                            </b-form-invalid-feedback>
                                        </div>
                                    </b-col>
                                    <b-col cols="6">
                                        <div role="group">
                                            <label for="email">Email:</label>
                                            <b-form-input
                                                id="email"
                                                v-model="form.email"
                                                type="email"
                                                size="sm"

                                                aria-describedby="input-live-help input-live-feedback"
                                                trim
                                            ></b-form-input>
                                            <b-form-invalid-feedback :state="!form.errors.has('email')">
                                                {{ form.errors.get('email') }}
                                            </b-form-invalid-feedback>
                                        </div>
                                    </b-col>
                                    <b-col cols="6">
                                        <div role="group">
                                            <label for="phone">Phone</label>
                                            <b-form-input
                                                id="phone"
                                                v-model="form.phone"

                                                type="tel"
                                                size="sm"
                                                aria-describedby="input-live-help input-live-feedback"
                                                trim
                                            ></b-form-input>
                                            <b-form-invalid-feedback :state="!form.errors.has('phone')">
                                                {{ form.errors.get('phone') }}
                                            </b-form-invalid-feedback>
                                        </div>
                                    </b-col>
                                    <b-col cols="12">
                                        <div role="group">
                                            <label for="subject">Subject</label>
                                            <b-form-input
                                                id="subject"
                                                v-model="form.subject"

                                                size="sm"
                                                type="text"
                                                aria-describedby="input-live-help input-live-feedback"
                                                trim
                                            ></b-form-input>
                                            <b-form-invalid-feedback :state="!form.errors.has('subject')">
                                                {{ form.errors.get('subject') }}
                                            </b-form-invalid-feedback>
                                        </div>
                                    </b-col>
                                    <b-col cols="12">
                                        <div role="group">
                                            <label>Message</label>
                                            <b-form-textarea
                                                id="textarea-small"
                                                size="sm"
                                                v-model="form.message"
                                            ></b-form-textarea>
                                        </div>
                                    </b-col>
                                    <b-col class="mt-2 text-right" cols="12">
                                        <b-button type="submit" variant="primary">Submit</b-button>
                                    </b-col>
                                </b-row>
                            </b-form>
                        </b-card-text>
                    </b-card-body>
                </b-col>
            </b-row>
        </b-card>
    </div>
</template>

<script>
import Form from 'vform';

export default {
    name: "form",
    data() {
        return {
            form: new Form({
                first_name: null,
                last_name: null,
                email: null,
                phone: null,
                subject: null,
                message: null
            })
        }
    },
    methods: {
        onSubmit() {
            this.form.post('http://127.0.0.1:8000/submit')
                .then((response) => {
                    this.form.reset()
                    this.$toasted.show("Successfully submitted !!", {
                        theme: "outline",
                        position: "top-right",
                        duration : 5000
                    });

                })
                .catch((error) => {
                })
                .finally(() => {
                })
        }
    }
}
</script>

<style>

</style>