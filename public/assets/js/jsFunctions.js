/**
 * Created By Muhammad Junaid

 * @param sURL      "sURL is requesting address"
 * @param objData   "objData it json object containing key value pair only use when sending data to server using POST"
 * @param sType     "sType is method by with call will proceed such as POST GET"
 * @returns {Promise<{}>}
 * @constructor
 *
 * how to use

 async function yourFunctionName() {
    const response = await AsyncAjax("yourURL", {id: 1, action: "add"});
 }

 */
async function AsyncAjax(sURL, objData = {}, sType = "POST") {
    const csrfToken = $("meta[name='csrf-token']").attr("content");
    let response= {};
    await $.ajax({
        headers : {"X-CSRF-TOKEN": csrfToken},
        url     : sURL,
        data    : objData,
        type    : sType,
        success : await async function(sResponse) {
            try {
                response = JSON.parse(sResponse);
            } catch(e) {
                response = sResponse;
            }
        },
        error   : await async function(error) {
            response = error;
        }
    });
    return response;
}
