/**
 * Created by Administrator on 2017/2/22.
 */
/*判断是手机端还是PC端*/
function IsPc(){
    var userAgentInfo=navigator.userAgent;
    var Agents=["Android","iPhone","SymbianOS","Windows Phone","iPad","iPod"];
    var flag=true;
    for(var v=0;v<Agents.length;v++){
        if(userAgentInfo.indexOf(Agents[v])>0){
            flag=false;
            break;
        }
    }
    return flag;

}
    var flag=IsPc();

        if(flag==true){
            console.log('PC端');
        }else{
            console.log('手机端');
        }
