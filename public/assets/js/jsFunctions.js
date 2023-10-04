/**
 * Created By Muhammad Junaid

 * @param sURL          "sURL is requesting address"
 * @param objData       "objData it json object containing key value pair only use when sending data to server using POST"
 * @param sType         "sType is method by with call will proceed such as POST GET"
 * @param processData   "true for string objects, false for image objects"
 * @param contentType   "false for image objects"
 * @returns {Promise<{}>}
 * @constructor
 *
 * how to use

 async function yourFunctionName() {
 const response = await AsyncAjax("yourURL", {id: 1, action: "add"});
 }

 */
async function AsyncAjax(sURL, objData = {}, sType = "POST", processData = true, contentType= "application/x-www-form-urlencoded; charset=UTF-8") {
    const csrfToken = "";//$("meta[name='csrf-token']").attr("content");
    let response= {};
    await $.ajax({
        headers     : {"X-CSRF-TOKEN": csrfToken},
        url         : sURL,
        data        : objData,
        type        : sType,
        contentType : contentType,
        processData : processData,
        success : await async function(sResponse) {
            try {
                response = JSON.parse(sResponse);
                showToast(response);
            } catch(e) {
                response = sResponse;
                if(typeof(response) === "object" && ("ResponseCode" in response))
                    showToast(response);
            }
        },
        error   : await async function(error) {
            const iTimeout = 10000;
            const sPosition = "top-right";
            const sTitle    = "ERROR";
            let sMessage    = error.status + " | Unknown error";
            const objErrorCode= {
                "404": "Requested URL not found",
                "500": "Internal server error. Please contact system administrator",
                "419": "Session timeout! Please login again",
                "403": "Bad request",
                "401": "Unauthenticated",
            };
            if(objErrorCode[error.status] !== undefined)
                sMessage = objErrorCode[error.status];

            toast(sTitle, sTitle, sMessage, sPosition, iTimeout);
        }
    });
    return response;
}

/**
 *
 * @param obj   "response object from ajax"
 * ResponseCode 201 for showing error toast
 * ResponseCode 200 for showing success toast
 */
function showToast(obj) {

    const responseMessage   = obj.ResponseMessage.split("|");
    let position     = "bottom-center";
    if(responseMessage[1] !== undefined)
        position = responseMessage[1];

    if(obj.ResponseCode === 200)
        toast("success", "Success",responseMessage[0], position);
    else if(obj.ResponseCode === 201)
        toast("error", "Error",responseMessage[0], position);
}

/**
 *
 * @param sType         "Toast type such as error, success, info"
 * @param sTitle        "shown on top of toast"
 * @param sMessage      "toast text that has some meaning"
 * @param sPosition     "position of toast such as top right, bottom center, top left"
 * @param timeOut       "time for disappearing the toast"
 */
function toast(sType, sTitle, sMessage, sPosition = "bottom-center", timeOut = 5000) {
    sPosition = "toast-"+sPosition;
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": sPosition,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": timeOut,
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    if(sType === "info")
        toastr.info(sMessage, sTitle)
    else if(sType === "success")
        toastr.success(sMessage, sTitle)
    else
        toastr.error(sMessage, sTitle)
}
