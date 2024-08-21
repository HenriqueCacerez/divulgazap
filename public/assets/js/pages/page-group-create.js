class GroupCreatePage {
    constructor() {
        this.cacheElements();
        this.isLinkValid = false;
        this.bindEvents();
    }

    cacheElements() {
        this.elements = {
            form: $('#form-create-group'),
            groupImage: $('.group-image'),
            groupName: $('.group-name'),
            groupCategory: $('.group-category-name'),
            groupDescription: $('.group-description'),
            inputName: $('#name'),
            inputLink: $('#link'),
            inputDescription: $('#description'),
            inputCategory: $('#id_category'),
            warning: $('#warning-create-group'),
            btnSubmit: $('#btn-submit'),
            loading: $('#loading'),
            btnText: $('#text')
        };
    }

    sanitizeLinkGroup(link) {
        return link.split('/').filter(Boolean).pop();
    }

    toggleButtonLoading(isLoading) {
        this.elements.btnSubmit.prop('disabled', isLoading);
        this.elements.btnText.toggleClass("d-none", isLoading);
        this.elements.loading.toggleClass("d-none", !isLoading);
    }

    showAlert(message, status) {
        openAlert({
            element: this.elements.warning,
            message: message,
            color: status === 'success' ? 'success' : 'warning'
        });
    }

    updateGroupUI({ name, image }) {
        this.elements.groupImage.attr('src', image);
        this.elements.groupName.text(name);
        this.elements.inputName.val(name);
        this.elements.inputCategory.val(1).change();
    }

    async validateLinkGroup(inviteLink) {
        this.toggleButtonLoading(true);

        const response = await sendRequest('GET', `/api/group/validate/${inviteLink}`);
        const { status = 'error', group = null, message = 'Link de convite inválido ou expirado' } = response;

        this.toggleButtonLoading(false);

        if (status !== "success") {
            this.resetForm()
            this.showAlert(message, status);
            return;
        }

        this.updateGroupUI(group);
        this.isLinkValid = true;

        $('#first-step').addClass('d-none');
        $('#second-step').removeClass('d-none');
        this.elements.btnText.text("Enviar Grupo");
    }

    async createGroup(data) {
        this.toggleButtonLoading(true);

        const response = await sendRequest('POST', '/api/group', data);
        const { status = 'error' } = response;

        this.toggleButtonLoading(false);

        const message = status === 'success' ? "Grupo cadastrado com sucesso!" : response.message;
        this.showAlert(message, status);

        if (status === 'success') {
            this.resetForm();
        }
    }

    resetForm() {
        this.isLinkValid = false;
        grecaptcha.reset();
        $('#first-step').removeClass('d-none');
        $('#second-step').addClass('d-none');
        this.elements.inputLink.val('');
    }

    bindEvents() {
        this.elements.form.on('submit', (e) => this.handleSubmit(e));
        this.elements.inputCategory.on('change', () => this.handleCategoryChange());
        this.elements.inputName.on('keyup', () => this.updateGroupName());
        this.elements.inputDescription.on('keyup', () => this.updateGroupDescription());
    }

    handleSubmit(e) {
        e.preventDefault();

        const formData = {
            invite_link: this.sanitizeLinkGroup(this.elements.inputLink.val()),
            category_id: this.elements.inputCategory.val(),
            name: this.elements.inputName.val(),
            description: this.elements.inputDescription.val() || "",
            recaptchaResponse: grecaptcha.getResponse()
        };

        if (!this.isLinkValid) {
            this.validateLinkGroup(formData.invite_link);
            return;
        }

        if (!formData.recaptchaResponse) {
            this.showAlert("Por favor, complete o reCAPTCHA", 'warning');
            this.toggleButtonLoading(false);
            return;
        }

        this.createGroup(formData);
    }

    handleCategoryChange() {
        const nameSelected = this.elements.inputCategory.find('option:selected').text();
        this.elements.groupCategory.text(nameSelected);
    }

    updateGroupName() {
        this.elements.groupName.text(this.elements.inputName.val());
    }

    updateGroupDescription() {
        this.elements.groupDescription.text(this.elements.inputDescription.val());
    }
}

$(document).ready(() => {
    new GroupCreatePage();
});