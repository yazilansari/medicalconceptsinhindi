﻿	var aliasConfig = {
appName : ["", "", ""],
totalPageCount : [],
largePageWidth : [],
largePageHeight : [],
normalPath : [],
largePath : [],
thumbPath : [],

ToolBarsSettings:[],
TitleBar:[],
appLogoIcon:["appLogoIcon"],
appLogoLinkURL:["appLogoLinkURL"],
bookTitle : [],
bookDescription : [],
ButtonsBar : [],
ShareButton : [],
ShareButtonVisible : ["socialShareButtonVisible"],
ThumbnailsButton : [],
ThumbnailsButtonVisible : ["enableThumbnail"],
ZoomButton : [],
ZoomButtonVisible : ["enableZoomIn"],
FlashDisplaySettings : [],
MainBgConfig : [],
bgBeginColor : ["bgBeginColor"],
bgEndColor : ["bgEndColor"],
bgMRotation : ["bgMRotation"],
backGroundImgURL : ["mainbgImgUrl","innerMainbgImgUrl"],
pageBackgroundColor : ["pageBackgroundColor"],
flipshortcutbutton : [],
BookMargins : [],
topMargin : [],
bottomMargin : [],
leftMargin : [],
rightMargin : [],
HTMLControlSettings : [],
linkconfig : [],
LinkDownColor : ["linkOverColor"],
LinkAlpha : ["linkOverColorAlpha"],
OpenWindow : ["linkOpenedWindow"],
searchColor : [],
searchAlpha : [],
SearchButtonVisible : ["searchButtonVisible"],

productName : [],
homePage : [],
enableAutoPlay : ["autoPlayAutoStart"],
autoPlayDuration : ["autoPlayDuration"],
autoPlayLoopCount : ["autoPlayLoopCount"],
BookMarkButtonVisible : [],
googleAnalyticsID : ["googleAnalyticsID"],
OriginPageIndex : [],	
HardPageEnable : ["isHardCover"],	
UIBaseURL : [],	
RightToLeft: ["isRightToLeft"],	

LeftShadowWidth : ["leftPageShadowWidth"],	
LeftShadowAlpha : ["pageShadowAlpha"],
RightShadowWidth : ["rightPageShadowWidth"],
RightShadowAlpha : ["pageShadowAlpha"],
ShortcutButtonHeight : [],	
ShortcutButtonWidth : [],
AutoPlayButtonVisible : ["enableAutoPlay"],	
DownloadButtonVisible : ["enableDownload"],	
DownloadURL : ["downloadURL"],
HomeButtonVisible :["homeButtonVisible"],
HomeURL:['btnHomeURL'],
BackgroundSoundURL:['bacgroundSoundURL'],
//TableOfContentButtonVisible:["BookMarkButtonVisible"],
PrintButtonVisible:["enablePrint"],
toolbarColor:["mainColor","barColor"],
loadingBackground:["mainColor","barColor"],
BackgroundSoundButtonVisible:["enableFlipSound"],
FlipSound:["enableFlipSound"],
MiniStyle:["userSmallMode"],
retainBookCenter:["moveFlipBookToCenter"],
totalPagesCaption:["totalPageNumberCaptionStr"],
pageNumberCaption:["pageIndexCaptionStrs"]
};
var aliasLanguage={
frmPrintbtn:["frmPrintCaption"],
frmPrintall : ["frmPrintPrintAll"],
frmPrintcurrent : ["frmPrintPrintCurrentPage"],
frmPrintRange : ["frmPrintPrintRange"],
frmPrintexample : ["frmPrintExampleCaption"],
btnLanguage:["btnSwicthLanguage"],
btnTableOfContent:["btnBookMark"]
}
;
	var bookConfig = {
	appName:'flippdf',
	totalPageCount : 0,
	largePageWidth : 1080,
	largePageHeight : 1440,
	normalPath : "files/page/",
	largePath : "files/large/",
	thumbPath : "files/thumb/",
	
	ToolBarsSettings:"",
	TitleBar:"",
	appLogoLinkURL:"",
	bookTitle:"FLIPBUILDER",
	bookDescription:"",
	ButtonsBar:"",
	ShareButton:"",
	
	ThumbnailsButton:"",
	ThumbnailsButtonVisible:"Show",
	ZoomButton:"",
	ZoomButtonVisible:"Yes",
	FlashDisplaySettings:"",
	MainBgConfig:"",
	bgBeginColor:"#cccccc",
	bgEndColor:"#eeeeee",
	bgMRotation:45,
	pageBackgroundColor:"#FFFFFF",
	flipshortcutbutton:"Show",
	BookMargins:"",
	topMargin:10,
	bottomMargin:10,
	leftMargin:10,
	rightMargin:10,
	HTMLControlSettings:"",
	linkconfig:"",
	LinkDownColor:"#808080",
	LinkAlpha:0.5,
	OpenWindow:"_Blank",

	BookMarkButtonVisible:'true',
	productName : 'Demo created by Flip PDF',
	homePage : 'http://www.flipbuilder.com/',
	isFlipPdf : "true",
	TableOfContentButtonVisible:"true",
	searchTextJS:'javascript/search_config.js',
	searchPositionJS:undefined
};
	
	
	;bookConfig.BookTemplateName="metro";bookConfig.loadingCaptionColor="#DDDDDD";bookConfig.loadingBackground="#323232";bookConfig.appLogoOpenWindow="Blank";bookConfig.logoHeight="40";bookConfig.logoPadding="0";bookConfig.logoTop="0";bookConfig.toolbarColor="#110e0f";bookConfig.iconColor="#E5E5E5";bookConfig.pageNumColor="#000000";bookConfig.iconFontColor="#b7b7b7";bookConfig.toolbarAlwaysShow="No";bookConfig.formFontColor="#FFFFFF";bookConfig.formBackgroundColor="#27181A";bookConfig.ToolBarAlpha="1";bookConfig.CurlingPageCorner="Yes";bookConfig.showBookInstructionOnStart="false";bookConfig.InstructionsButtonVisible="Show";bookConfig.showInstructionOnStart="No";bookConfig.showGotoButtonsAtFirst="No";bookConfig.QRCode="Hide";bookConfig.HomeButtonVisible="Hide";bookConfig.HomeURL="%first page%";bookConfig.aboutButtonVisible="Hide";bookConfig.enablePageBack="Show";bookConfig.ShareButtonVisible="Hide";shareObj = [];bookConfig.isInsertFrameLinkEnable=" Hide";bookConfig.addCurrentPage="No";bookConfig.EmailButtonVisible="Hide";bookConfig.btnShareWithEmailBody="{link}";bookConfig.ThumbnailsButtonVisible="Show";bookConfig.thumbnailColor="#333333";bookConfig.thumbnailAlpha="70";bookConfig.BookMarkButtonVisible="Hide";bookConfig.TableOfContentButtonVisible="Show";bookConfig.isHideTabelOfContentNodes="yes";bookConfig.SearchButtonVisible="Show";bookConfig.leastSearchChar="3";bookConfig.searchKeywordFontColor="#FFB000";bookConfig.searchHightlightColor="#ffff00";bookConfig.SelectTextButtonVisible="Show";bookConfig.PrintButtonVisible="Hide";bookConfig.BackgroundSoundButtonVisible="Show";bookConfig.FlipSound="Yes";bookConfig.BackgroundSoundLoop="-1";bookConfig.AutoPlayButtonVisible="Show";bookConfig.autoPlayAutoStart="No";bookConfig.autoPlayDuration="9";bookConfig.autoPlayLoopCount="1";bookConfig.ZoomButtonVisible="Show";bookConfig.maxZoomWidth="1400";bookConfig.defaultZoomWidth="1000";bookConfig.mouseWheelFlip="Yes";bookConfig.ZoomMapVisible="Hide";bookConfig.DownloadButtonVisible="Hide";bookConfig.PhoneButtonVisible="Hide";bookConfig.AnnotationButtonVisible="Hide";bookConfig.FullscreenButtonVisible="Show";bookConfig.MagnifierButtonVisible="Hide";bookConfig.bgBeginColor="#6b5e53";bookConfig.bgEndColor="#6b5e53";bookConfig.bgMRotation="-90";bookConfig.backGroundImgURL="../files/mobile-ext/backGroundImgURL.jpg";bookConfig.backgroundPosition="stretch";bookConfig.backgroundOpacity="100";bookConfig.backgroundScene="None";bookConfig.LeftShadowWidth="90";bookConfig.LeftShadowAlpha="0.6";bookConfig.RightShadowWidth="55";bookConfig.RightShadowAlpha="0.6";bookConfig.ShowTopLeftShadow="Yes";bookConfig.HardPageEnable="No";bookConfig.hardCoverBorderWidth="8";bookConfig.borderColor="#572F0D";bookConfig.outerCoverBorder="Yes";bookConfig.cornerRound="8";bookConfig.leftMarginOnMobile="0";bookConfig.topMarginOnMobile="0";bookConfig.rightMarginOnMobile="0";bookConfig.bottomMarginOnMobile="0";bookConfig.pageBackgroundColor="#E8E8E8";bookConfig.flipshortcutbutton="Show";bookConfig.BindingType="side";bookConfig.RightToLeft="No";bookConfig.FlipDirection="0";bookConfig.flippingTime="0.6";bookConfig.retainBookCenter="Yes";bookConfig.FlipStyle="Flip";bookConfig.autoDoublePage="Yes";bookConfig.isTheBookOpen="No";bookConfig.thicknessWidthType="Thinner";bookConfig.thicknessColor="#ffffff";bookConfig.SingleModeBanFlipToLastPage="No";bookConfig.showThicknessOnMobile="No";bookConfig.isSingleBookFullWindowOnMobile="no";bookConfig.isStopMouseMenu="yes";bookConfig.restorePageVisible="No";bookConfig.topMargin="10";bookConfig.bottomMargin="10";bookConfig.leftMargin="10";bookConfig.rightMargin="10";bookConfig.hideMiniFullscreen="no";bookConfig.maxWidthToSmallMode="400";bookConfig.maxHeightToSmallMode="300";bookConfig.leftRightPnlShowOption="None";bookConfig.highDefinitionConversion="yes";bookConfig.LargeLogoPosition="top-left";bookConfig.LargeLogoTarget="Blank";bookConfig.isFixLogoSize="No";bookConfig.logoFixWidth="0";bookConfig.logoFixHeight="0";bookConfig.SupportOperatePageZoom="Yes";bookConfig.showHelpContentAtFirst="No";bookConfig.updateURLForPage="No";bookConfig.LinkDownColor="#800080";bookConfig.LinkAlpha="0.2";bookConfig.OpenWindow="Blank";bookConfig.showLinkHint="No";bookConfig.MidBgColor="#192862";bookConfig.useTheAliCloudChart ="no";bookConfig.totalPageCount=43;bookConfig.largePageWidth=1800;bookConfig.largePageHeight=2548;;bookConfig.securityType="1";bookConfig.CreatedTime ="230526115536";bookConfig.bookTitle="Dec 2022";bookConfig.bookmarkCR="e92795dfdddf20a9579a62488527256cd7397952";bookConfig.productName="Flip PDF Professional";bookConfig.homePage="http://www.flipbuilder.com";bookConfig.searchPositionJS="javascript/text_position[1].js";bookConfig.searchTextJS="javascript/search_config.js";bookConfig.normalPath="../files/mobile/";bookConfig.largePath="../files/mobile/";bookConfig.thumbPath="../files/thumb/";bookConfig.userListPath="../files/extfiles/users.js";var language = [{ language : "English",btnFirstPage:"First",btnNextPage:"Next Page",btnLastPage:"Last",btnPrePage:"Previous Page",btnDownload:"Download",btnPrint:"Print",btnSearch:"Search",btnClearSearch:"Clear",frmSearchPrompt:"Clear",btnBookMark:"Table of contents",btnHelp:"Help",btnHome:"Home",btnFullScreen:"Enable FullScreen",btnDisableFullScreen:"Disable FullScreen",btnSoundOn:"Sound On",btnSoundOff:"Sound Off",btnShareEmail:"Share",btnSocialShare:"Social Share",btnZoomIn:"Zoom In",btnZoomOut:"Zoom Out",btnDragToMove:"Move by mouse drag",btnAutoFlip:"Auto Flip",btnStopAutoFlip:"Stop Auto Flip",btnGoToHome:"Return Home",frmHelpCaption:"Help",frmHelpTip1:"Double click to zoom in or out",frmHelpTip2:"Drag the page corner to view",frmPrintCaption:"Print",frmPrintBtnCaption:"Print",frmPrintPrintAll:"Print All Pages",frmPrintPrintCurrentPage:"Print Current Page",frmPrintPrintRange:"Print Range",frmPrintExampleCaption:"Example: 2,5,8-26",frmPrintPreparePage:"Preparing Page:",frmPrintPrintFailed:"Print Failed:",pnlSearchInputInvalid:"(Minimal request length is 3 symbols)",loginCaption:"Login",loginInvalidPassword:"Not a valid password!",loginPasswordLabel:"Password:",loginBtnLogin:"Login",loginBtnCancel:"Cancel",btnThumb:"Thumbnails",lblPages:"Pages:",lblPagesFound:"Pages:",lblPageIndex:"Page",btnAbout:"About",frnAboutCaption:"About & Contact",btnSinglePage:"Single Page",btnDoublePage:"Double Page",btnSwicthLanguage:"Switch Language",tipChangeLanguage:"Please select a language below...",btnMoreOptionsLeft:"More Options",btnMoreOptionsRight:"More Options",btnFit:"Fit Window",smallModeCaption:"Click to view in fullscreen",btnAddAnnotation:"Add Annotations",btnAnnotation:"Annotations",FlipPageEditor_SaveAndExit:"Save and Exit",FlipPageEditor_Exit:"Exit",DrawToolWindow_Redo:"Redo",DrawToolWindow_Undo:"Undo",DrawToolWindow_Clear:"Clear",DrawToolWindow_Brush:"Brush",DrawToolWindow_Width:"Width",DrawToolWindow_Alpha:"Alpha",DrawToolWindow_Color:"Color",DrawToolWindow_Eraser:"Eraser",DrawToolWindow_Rectangular:"Rectangular",DrawToolWindow_Ellipse:"Ellipse",TStuff_BorderWidth:"Border Width",TStuff_BorderAlph:"Border Alpha",TStuff_BorderColor:"Border Color",DrawToolWindow_TextNote:"Text Note",AnnotMark:"Bookmarks",lastpagebtnHelp:"Last page",firstpagebtnHelp:"First page",homebtnHelp:"Return to home page",aboubtnHelp:"About",screenbtnHelp:"Open this application in full-screen mode",helpbtnHelp:"Show help",searchbtnHelp:"Search from pages",pagesbtnHelp:"Take a look at the thumbnail of this brochure",bookmarkbtnHelp:"Open Bookmarks",AnnotmarkbtnHelp:"Open Table of contents",printbtnHelp:"Print the brochure",soundbtnHelp:"Turn on or off the sound",sharebtnHelp:"Send Email to",socialSharebtnHelp:"Social Share",zoominbtnHelp:"Zoom in",downloadbtnHelp:"Downdlaod this brochure",pagemodlebtnHelp:"Switch Single and double page mode",languagebtnHelp:"Switch Lauguage",annotationbtnHelp:"Add Annotation",addbookmarkbtnHelp:"Add Bookmark",removebookmarkbtnHelp:"Remove Bookmark",updatebookmarkbtnHelp:"Update Bookmark",btnShoppingCart:"Shopping Cart",Help_ShoppingCartbtn:"Shopping Cart",Help_btnNextPage:"Next page",Help_btnPrePage:"Previous page",Help_btnAutoFlip:"Auto filp",Help_StopAutoFlip:"Stop atuo filp",btnaddbookmark:"Add",btndeletebookmark:"Delete",btnupdatebookmark:"Update",frmyourbookmarks:"Your bookmarks",frmitems:"items",DownloadFullPublication:"Full Publication",DownloadCurrentPage:"Current Page",DownloadAttachedFiles:"Attached Files",lblLink:"Link",btnCopy:"Copy Button",infCopyToClipboard:"Your browser does not support clipboard.",restorePage:"Would you like to restore previous session",tmpl_Backgoundsoundon:"Background Sound On",tmpl_Backgoundsoundoff:"Background Sound Off",tmpl_Flipsoundon:"Flip Sound On",tmpl_Flipsoundoff:"Flip Sound Off",Help_PageIndex:"The current page number",tmpl_PrintPageRanges:"PAGE RANGES",tmpl_PrintPreview:"PREVIEW",btnSelection:"Select Text",loginNameLabel:"Name:",btnGotoPage:"	Go",btnSettings:"Setting",soundSettingTitle:"Sound Setting",closeFlipSound:"Close Flip Sound",closeBackgroundSound:"Close Backgorund Sound",frmShareCaption:"Share",frmShareLinkLabel:"Link:",frmShareBtnCopy:"Copy",frmShareItemsGroupCaption:"Social Share",frmPanelTitle:"Share it",frmShareQRcode:"QRCode",TAnnoActionPropertyStuff_GotoPage:"Go to page",btnPageBack:"Backward",btnPageForward:"Forward",SelectTextCopy:"Copy Selected Text",selectCopyButton:"Copy",TStuffCart_TypeCart:"Shopping Cart",TStuffCart_DetailedQuantity:"Quantity",TStuffCart_DetailedPrice:"Price",ShappingCart_Close:"Close",ShappingCart_CheckOut:"Checkout",ShappingCart_Item:"Item",ShappingCart_Total:"Total",ShappingCart_AddCart:"Add to cart",ShappingCart_InStock:"In Stock",TStuffCart_DetailedCost:"Shipping cost",TStuffCart_DetailedTime:"Delivery time",TStuffCart_DetailedDay:"day(s)",ShappingCart_NotStock:"Not enough in stock",btnCrop:"Crop",btnDragButton:"Drag",btnFlipBook:"Flip Book",btnSlideMode:"Slide Mode",btnSinglePageMode:"Single Page Mode",btnVertical:"Vertical Mode",btnHotizontal:"Horizontal Mode",btnClose:"Close",btnDoublePage:"Double Page",btnBookStatus:"Book View",checkBoxInsert:"Insert Current Page",lblLast:"This is the last page.",lblFirst:"This is the first page.",lblFullscreen:"Click to view in fullscreen",lblName:"Name",lblPassword:"Password",lblLogin:"Login",lblCancel:"Cancel",lblNoName:"User name can not be empty.",lblNoPassword:"Password can not be empty.",lblNoCorrectLogin:"Please enter the correct user name and password.",btnVideo:"Video Gallery",btnSlideShow:"Slide Show",pnlSearchInputInvalid:"(Minimal request length is 3 symbols)",btnDragToMove:"Move by mouse drag",btnPositionToMove:"Move by mouse position",lblHelp1:"Drag the page corner to view",lblHelp2:"Double click to zoom in, out",lblCopy:"Copy",lblAddToPage:"add to page",lblPage:"Page",lblTitle:"Title",lblEdit:"Edit",lblDelete:"Delete",lblRemoveAll:"Remove All",tltCursor:"cursor",tltAddHighlight:"add highlight",tltAddTexts:"add texts",tltAddShapes:"add shapes",tltAddNotes:"add notes",tltAddImageFile:"add image file",tltAddSignature:"add signature",tltAddLine:"add line",tltAddArrow:"add arrow",tltAddRect:"add rect",tltAddEllipse:"add ellipse",lblDoubleClickToZoomIn:"Double click to zoom in.",frmShareCaption:"Share",frmShareLabel:"Share",frmShareInfo:"You can easily share this publication to social networks.Just cilck the appropriate button below.",frminsertLabel:"Insert to Site",frminsertInfo:"Use the code below to embed this publication to your website.",btnQRCode:"Click to scan QR code",btnRotateLeft:"Rotate Left",btnRotateRight:"Rotate Right",lblSelectMode:"Select view mode please.",frmDownloadPreview:"Preview",frmHowToUse:"How To Use",lblHelpPage1:"Move your finger to flip the book page.",lblHelpPage2:"Zoom in by using gesture or double click on the page.",lblHelpPage3:"Click on the logo to reach the official website of the company.",lblHelpPage4:"Add bookmarks, use search function and auto flip the book.",lblHelpPage5:"Switch horizontal and vertical view on mobile devices.",TTActionQuiz_PlayAgain:"Do you wanna play it again",TTActionQuiz_Ration:"Your ratio is",frmTelephone:"Telephone list",btnDialing:"Dialing",lblSelectMessage:"Please copy the the text content in the text box",btnSelectText:"Select Text",btnNote:"Annotation",btnPhoneNumber:"Telephone",btnWeCharShare:"WeChat Share",btnMagnifierIn:"Magnifying Glass",btnMagnifierOut:"Magnifier Reduction",frmShareSmallProgram:"smallProgram",btnMagnifier:"Magnifier",frmPrintPrintLimitFailed:"Sorry, you can't print the pages.",infNotSupportHtml5:"HTML5 is not supported by your current web browser, please read the book with latest verson web browser. Here we recommend you to read it with Chrome.",btnReport:"Report",btnDoubleSinglePage:"Page switch",frmBookMark:"Bookmark",btnFullscreen:"Fullscreen",btnExitFullscreen:"Exit Fullscreen",btnMore:"More",frmPrintall:"Print All Pages",frmPrintcurrent:"Print Current Page",frmPrintRange:"Print Range",frmPrintexample:"Example: 2,3,5-10",frmPrintbtn:"Print",frmaboutcaption:"Contact",frmaboutcontactinformation:"Contact Information",frmaboutADDRESS:"Address",frmaboutEMAIL:"Email",frmaboutWEBSITE:"Website",frmaboutMOBILE:"Mobile",frmaboutAUTHOR:"Author",frmaboutDESCRIPTION:"Description",frmSearch:"Search",frmToc:"Table Of Contents",btnTableOfContent:"Table Of Contents",lblDescription:"Title",frmLinkLabel:"Link",frmQrcodeCaption:"Scan the bottom two-dimensional code to view with mobile phone."}];;function orgt(s){ return binl2hex(core_hx(str2binl(s), s.length * chrsz));};; var pageEditor = {"setting":{}, "pageAnnos":[[],[],[{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.092576","y":"0.160763","width":"0.860186","height":"0.050408"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"4"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.090712","y":"0.220867","width":"0.864663","height":"0.050445"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"8"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.090712","y":"0.279492","width":"0.864663","height":"0.051809"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"10"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.092643","y":"0.339481","width":"0.882033","height":"0.051808"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"14"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.090712","y":"0.396742","width":"0.885894","height":"0.068170"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"19"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.090712","y":"0.473091","width":"0.883963","height":"0.055899"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"23"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.088782","y":"0.538534","width":"0.889754","height":"0.047719"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"26"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.090712","y":"0.591706","width":"0.885894","height":"0.054535"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"28"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.088782","y":"0.654421","width":"0.889754","height":"0.069532"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"30"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.086852","y":"0.733496","width":"0.895545","height":"0.046356"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"32"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.088782","y":"0.790758","width":"0.893615","height":"0.049082"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"35"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.092643","y":"0.845293","width":"0.883964","height":"0.057262"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"37"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.086852","y":"0.906645","width":"0.889754","height":"0.050445"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionGotoPage","pageIndex":"40"}}],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.383721","y":"0.690028","width":"0.234273","height":"0.165489"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionOpenURL","url":"https://bit.ly/mchindia"}}],[{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.452249","y":"0.792522","width":"0.196487","height":"0.019574"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionOpenURL","url":"https://bit.ly/mchindia"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.457287","y":"0.812096","width":"0.183892","height":"0.019574"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionOpenURL","url":"https://bit.ly/3fiAuCL"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.453508","y":"0.831669","width":"0.200265","height":"0.019574"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionOpenURL","url":"https://bit.ly/2SSmSqn"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.391791","y":"0.851243","width":"0.301028","height":"0.019574"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionOpenURL","url":"https://twitter.com/mch_drpankaj"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.323777","y":"0.870817","width":"0.467286","height":"0.019574"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionOpenURL","url":"https://www.instagram.com/medicalconcepts_hindi/"}},{"annotype":"com.mobiano.flipbook.pageeditor.TAnnoLink","location":{"x":"0.400450","y":"0.792244","width":"0.290740","height":"-0.019389"},"action":{"triggerEventType":"mouseDown","actionType":"com.mobiano.flipbook.pageeditor.TAnnoActionOpenURL","url":"http://medicalconceptsinhindi.in"}}]]}; bookConfig.isFlipPdf=true; var pages_information =[{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{}];	
	if(language&&language.length>0&&language[0]&&language[0].language){
		bookConfig.language=language[0].language;
	}
	
try{
	for(var i=0;pageEditor!=undefined&&i<pageEditor.length;i++){
		if(pageEditor[i].length==0){
			continue;
		}
		for(var j=0;j<pageEditor[i].length;j++){
			var anno=pageEditor[i][j];
			if(anno==undefined)continue;
			if(anno.overAlpha==undefined){
				anno.overAlpha=bookConfig.LinkAlpha;
			}
			if(anno.outAlpha==undefined){
				anno.outAlpha=0;
			}
			if(anno.downAlpha==undefined){
				anno.downAlpha=bookConfig.LinkAlpha;
			}
			if(anno.overColor==undefined){
				anno.overColor=bookConfig.LinkDownColor;
			}
			if(anno.downColor==undefined){
				anno.downColor=bookConfig.LinkDownColor;
			}
			if(anno.outColor==undefined){
				anno.outColor=bookConfig.LinkDownColor;
			}
			if(anno.annotype=='com.mobiano.flipbook.pageeditor.TAnnoLink'){
				anno.alpha=bookConfig.LinkAlpha;
			}
		}
	}
}catch(e){
}
try{
	$.browser.device = 2;
}catch(ee){
}