
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="keywords" content="<?php echo get_post_meta($post->ID,'Keywords',true); ?>">
    <meta name="description" content="<?php echo get_post_meta($post->ID,'Description',true); ?>" />
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, MUST-REVALIDATE">
    <meta name="author" content="RGD">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate, max-age=0, private" />
    <meta http-equiv="Expires" content="0" />
    
    <?php if( get_post_meta($post->ID, 'Title', true) ) { ?>
    <title><?php echo get_post_meta($post->ID,'Title',true); ?></title>
    <?php } else { ?>
    <title>Rat Genome Database</title>
    <?php } ?>

    <link rel="stylesheet" href="/rgdweb/css/jquery/jquery-ui-1.8.18.custom.css">
    <link rel="SHORTCUT ICON" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/rgdweb/common/modalDialog/subModal.css" />
    <link rel="stylesheet" type="text/css" href="/rgdweb/common/modalDialog/style.css" />
    <link href="/rgdweb/common/rgd_styles-3.css" rel="stylesheet" type="text/css" />

    <!-- adding link for OntoSolr (Pushkala) -->
    <link rel="stylesheet" href="/OntoSolr/files/jquery.autocomplete.css" type="text/css" />


    <script type="text/javascript" src="/rgdweb/common/modalDialog/common.js"></script>
    <script type="text/javascript" src="/rgdweb/common/modalDialog/subModal.js"></script>
    <script src="/rgdweb/js/jquery/jquery-1.7.1.min.js"></script>
    <script src="/rgdweb/js/jquery/jquery-ui-1.8.18.custom.min.js"></script>
    <script src="/rgdweb/js/jquery/jquery_combo_box.js"></script>

    <script src="https://www.google-analytics.com/urchin.js" type="text/javascript"></script>
    <script type="text/javascript">
        _uacct = "UA-2739107-2";
        urchinTracker();
    </script>

    <script type="text/javascript" src="/rgdweb/js/rgdHomeFunctions-3.js"></script>

    

    <script>
        function getLoadedObject() {
            return "";
        }
        function getGeneWatchAttributes() {
            //return ["Nomenclature Changes","New GO Annotation","New Disease Annotation","New Phenotype Annotation","New Pathway Annotation","New PubMed Reference","Altered Strains","New NCBI Transcript/Protein","New Protein Interaction","RefSeq Status Has Changed"];
            return ["Nomenclature Changes","RefSeq Status Has Changed","New GO Annotation","New Disease Annotation","New Phenotype Annotation","New Pathway Annotation","New Strain Annotation","New PubMed Reference","New NCBI Transcript/Protein","New Protein Interaction","New External Database Link"]
        }
        function getTermWatchAttributes() {
            return ["Nomenclature Changes","RefSeq Status Has Changed","New GO Annotation","New Disease Annotation","New Phenotype Annotation","New Pathway Annotation","New Strain Annotation","New PubMed Reference","New NCBI Transcript/Protein","New Protein Interaction","New External Database Link"]
        }


    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/rgdweb/css/elasticsearch/elasticsearch.css">
    <link rel="stylesheet" href="/rgdweb/common/bootstrap/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/rgdweb/common/bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript" src="/rgdweb/common/angular/1.4.8/angular.js"></script>
    <script type="text/javascript" src="/rgdweb/common/angular/1.4.8/angular-sanitize.js"></script>
    <script type="text/javascript" src="/rgdweb/my/my.js?5"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/rgdweb/common/jquery-ui/jquery-ui.css">
    <script src="/rgdweb/common/jquery-ui/jquery-ui.js"></script>

    <script type="text/javascript" src="/rgdweb/js/elasticsearch/elasticsearchcommon.js"></script>
<?php wp_head(); ?>
</head>

<style>
    a {
        color:#0C1D2E;
        olor:#073C66;
        text-decoration:underline;
        ont-weight:700;
    }
</style>


<body  ng-cloak ng-app="rgdPage">


<div ng-controller="RGDPageController as rgd" id="RGDPageController">


<div class="container-fluid">
    <!-- Modal -->
    <div class="modal fade" id="my-modal" role="dialog">
        <div class="modal-dialog modal-lg">
           <div class="modal-content" id="rgd-modal" >

                <!-- twitter boot strap model -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <table align="center">
                        <tr>
                            <td style="padding:20px;"><img src="/rgdweb/common/images/rgd_LOGO_blue_rgd.gif" border="0"/></td>
                        </tr>
                    </table>

                </div>
                <div class="modal-body">

                    <div style="padding-bottom:20px;">
                    <div style="float:left; margin-right:10px; min-width: 600px;">Welcome <span style="font-weight:700; font-size:16px;">{{ username}}</span></div>
                    <input  value="Update Account" type="button"  style="margin-right:10px;border:0px solid black; background-color:#4584ED; color:white; font-weight:700;padding:8px;" onClick="location.href='/rgdweb/my/account.html'"/>
                    <input  value="Sign Out" type="button"  ng-click="rgd.logout()"  data-dismiss="modal" style="margin-right:10px;border:0px solid black; background-color:#4584ED; color:white; font-weight:700;padding:8px;"/>
                    </div>

                    <div style="text-decoration:underline;font-weight:700; background-color:#e0e2e1;min-width:690px;">Message Center</div>
                    <div style="display:table-row;">
                    <div style="display: table-cell; float:left; margin-right:10px; min-width: 600px;font-size:13px;padding-bottom: 10px;">{{ messageCount }} Messages</div>
                    <div style="display: table-cell; float:left; margin-right:10px;min-width: 90px"><a href="/rgdweb/my/account.html">Go to Message Center</a></div>
                    </div>

                    <div style="text-decoration:underline;font-weight:700; background-color:#e0e2e1;">Watched Genes</div>
                    <div ng-repeat="watchedObject in watchedObjects" style="display:table-row;">

                        <div style="display: table-cell; float:left; margin-right:10px; min-width: 600px;">{{$index + 1}}. <span style="font-weight:700;">{{ watchedObject.symbol }} (RGD ID:{{watchedObject.rgdId}})</span></div>
                        <div style="display: table-cell; float:left;  margin-right:10px; min-width: 40px;"><a href="javascript:return false;" ng-click="rgd.addWatch(watchedObject.rgdId)">Update Watcher</a></div>
                        <div style="display: table-cell; float:left;  margin-right:10px; min-width: 50px;" ><a href="javascript:return false;" ng-click="rgd.removeWatch(watchedObject.rgdId)">Remove Watcher</a></div>
                    </div>
                    <div style="margin-top:20px;text-decoration:underline;font-weight:700;background-color:#e0e2e1;">Watched Ontology Terms</div>
                    <div ng-repeat="watchedTerm in watchedTerms" style="display:table-row;">

                        <div style="display: table-cell; float:left; margin-right:10px; min-width: 600px;">{{$index + 1}}. <span style="font-weight:700;">{{ watchedTerm.term }} ({{watchedTerm.accId}})</span></div>
                        <div style="display: table-cell; float:left;  margin-right:10px; min-width: 40px;"><a href="javascript:return false;" ng-click="rgd.addWatch(watchedTerm.accId)">Update Watcher</a></div>
                        <div style="display: table-cell; float:left;  margin-right:10px; min-width: 50px;" ><a href="javascript:return false;" ng-click="rgd.removeWatch(watchedTerm.accId)">Remove Watcher</a></div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close Window</button>
                </div>


               

                <div ng-repeat="gene in geneList" style="padding-left:10px;">
                    <span style="font-weight:700; ">{{gene.symbol}}:</span> {{ gene.description }}
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- twitter bootstrap modal Save List to RGD-->

    <div class="container-fluid" >

        <!-- Modal -->
        <div class="modal fade" id="name-desc-modal" role="dialog">
            <div class="modal-dialog modal-small">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Save List to My RGD</h4>
                    </div>
                    <div class="modal-body">
                        <table align="center">
                            <tr>
                                <td>Create Name:&nbsp;&nbsp;</td>
                                <td><input id="myRgdListName" size="40" type="text" value="{{listName}}" ng-model="listName"/></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Description:&nbsp;&nbsp;</td>
                                <td><input id="myRgdListDesc" size="40" type="text" value="{{listDescription}}" ng-model="listDescription"/></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" ng-click="rgd.saveList($event)" class="btn btn-default" data-dismiss="modal">Save List</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!--  Login box -------------->
<div class="ontainer-fluid" >

        <!-- Modal -->
        <div class="modal fade" id="login-modal" role="dialog">
            <div class="modal-dialog modal-small">
                <div class="modal-content" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <table align="center">
            <tr>
                <td style="padding:20px;"><img src="/rgdweb/common/images/rgd_LOGO_blue_rgd.gif"  border="0"/></td>
            </tr>
        </table>

    </div>
    <div class="modal-body">

        <table align="center" style="padding-bottom:20px;">
            <tr>
                <td align="center" style="font-size:30px;color:#55556D;">Save what matters to you</td>
            </tr>
            <tr>
                <td style="color:red;font-weight:700; font-size:18px;">{{ loginError }}</td>
            </tr>
        </table>



        <table align="center">
            <tr>
                <td style="font-size:20px;">Sign in with your RGD account</td>
            </tr>
        </table>


        <form>
            <table align="center" border=0 style="border:2px outset lightgrey;background-color:#F7F7F7;padding:40px;">
                <tr>
                    <td>Email Address:</td>
                    <td><input type='text' size='30' id="j_username" name='j_username' value="" value=''</td></tr>
                <tr><td>Password:</td><td><input  size='30' type='password' id="j_password" name='j_password' value=""></td></tr>

                <tr>
                    <td align="center" colspan="2">
                        <table cellpadding="5">
                            <tr>
                                <td><input name="submit"  data-dismiss="modal" type="button" value="Cancel" style="font-size:16px; margin-top:20px;"></td>
                                <td><input name="submit" type="submit" value="Log In" style="font-size:16px; margin-top:20px;" ng-click="rgd.login()"  nClick="doLogin()" ></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tr>
            </table>

        </form>


        <table align="center" border="0">
            <tr>
                <td>
                    <a href="/rgdweb/my/account.html?submit=Create" style="font-size:16px; margin-right:10px;">Create New Account</a>
                </td>
                <td>
                    <a href="/rgdweb/my/lookup.html" style="font-size:16px;">Recover Password</a>
                </td>
            </tr>
        </table>


        </div>
      </div>
    </div>
</div>

<!-- watch object select window-->

<div class="container-fluid" >

    <!-- Modal -->
    <div class="modal fade" id="watch-modal" role="dialog">
        <div class="modal-dialog modal-small">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ watchLinkText }}</h4>
                </div>
                <div class="modal-body">

                    <div style="padding-bottom:10px;">Select categories you would like to watch.  Updates to this gene will be send to {{ username }}</div>

                     <label ng-repeat="geneWatchAttr in geneWatchAttributes">
                        <input
                                type="checkbox"
                                name="geneWatchSelection[]"
                                value="{{geneWatchAttr}}"
                                ng-checked="geneWatchSelection.indexOf(geneWatchAttr) > -1"
                                ng-click="toggleGeneWatchSelection(geneWatchAttr)"
                        > {{geneWatchAttr}}
                        <br>
                    </label>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                    <span ng-if="watchLinkText == 'Update Watcher'">
                        <button type="button" ng-click="rgd.removeWatch(activeObject)" class="btn btn-default" data-dismiss="modal">Stop Watching</button>
                    </span>
                    <button type="button" ng-click="rgd.saveWatch(activeObject)" class="btn btn-default" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!--  tool navigation -->
        <!-- twitter bootstrap modal Save List to RGD-->

        <div class="container-fluid" >

            <!-- Modal -->
            <div class="modal fade" id="tools-modal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 style="font-size:16px;" class="modal-title">Analyze <span ng-if="oKey==1">Gene</span><span ng-if="oKey==5">Strain</span><span ng-if="oKey==6">QTL</span>  List</h4>

                        </div>
                        <div class="modal-body">

                            <table width="90%" align="center" border="0">
                                <tr>
                                    <td align="center"><div ng-if="oKey==1"><img src="/rgdweb/common/images/functionalAnnotation.png" border="0"  style="cursor:pointer;padding:5px; margin-right:0px;margin-bottom:5px; border:1px solid black;" ng-click="rgd.toolSubmit('ga')"/></div><div ng-if="oKey!=1">Functional Annotation<br>unavailable</div></td>
                                    <td align="center"><div ng-if="oKey==1"> <img src="/rgdweb/common/images/gaTool.png" border="0" style="cursor:pointer;padding:5px; margin-bottom:5px; border:1px solid black;" ng-click="rgd.toolSubmit('distribution')"/></div><div ng-if="oKey!=1">Annotation Distribution<br>unavailable</div></td>
                                    <td align="center"><div ng-if="oKey==1"><div ng-if="speciesTypeKey==1 || speciesTypeKey==3" ><img src="/rgdweb/common/images/variantVisualizer.png" border="0"  style="cursor:pointer;padding:5px; margin-right:0px;margin-bottom:5px; border:1px solid black;"  ng-click="rgd.toolSubmit('vv')"/></div><div ng-if="speciesTypeKey!=1 && speciesTypeKey!=3">Genomic Variants<br> unavailble for Mouse</div></div><div ng-if="oKey!=1">Genomic Variants<br>unavailable</div></td>
                                </tr>
                                <tr>
                                    <td align="center"  style="cursor:pointer;font-size:16px;font-weight:400;" ng-click="rgd.toolSubmit('ga')"><div ng-if="oKey==1">Functional Annotation</div></td>
                                    <td align="center" style="cursor:pointer;font-size:16px;font-weight:400;" ng-click="rgd.toolSubmit('distribution')"><div ng-if="oKey==1">Annotation Distribution</div></td>

                                    <td align="center" style="cursor:pointer;font-size:16px;font-weight:400;" ng-click="rgd.toolSubmit('vv')"><div ng-if="speciesTypeKey==1 || speciesTypeKey==3" ><div ng-if="oKey==1">Genomic Variants</div></div></td>

                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td align="center"><div ng-if="oKey==1"><img src="/rgdweb/common/images/interviewer.png" border="0" style="cursor:pointer;padding:5px; margin-right:0px; border:1px solid black;" ng-click="rgd.toolSubmit('interviewer')"/></div><div ng-if="oKey!=1">Protein-Protein Interactions<br>unavailable</div></td>
                                    <td align="center"><div ng-if="speciesTypeKey==1 || speciesTypeKey==3 || speciesTypeKey==2" ><div ng-if="oKey==1"> <img src="/rgdweb/common/images/gviewer.png" border="0" style="cursor:pointer;padding:5px; margin-bottom:5px; border:1px solid black;" ng-click="rgd.toolSubmit('gviewer')"/></div></div><div ng-if="oKey!=1 || speciesTypeKey > 3">Genome Viewer<br>unavailable</div></td>
                                    <td align="center"><div ng-if="oKey==1"><div ng-if="speciesTypeKey==1 || speciesTypeKey==3" > <img src="/rgdweb/common/images/damaging.png" border="0" style="cursor:pointer;padding:5px; margin-right:0px; border:1px solid black;" ng-click="rgd.toolSubmit('damage')"/></div><div ng-if="speciesTypeKey!=1 && speciesTypeKey!=3">Damaging Variants unavailble for Mouse</div></div><div ng-if="oKey!=1">Damaging Variants<br>unavailable</div></td>
                                </tr>
                                <tr>
                                    <td align="center" style="cursor:pointer;font-size:16px;font-weight:400;" ng-click="rgd.toolSubmit('interviewer')"><div ng-if="oKey==1">Protein-Protein Interactions</div></td>
                                    <td align="center" style="cursor:pointer;font-size:16px;font-weight:400;" ng-click="rgd.toolSubmit('gviewer')"><div ng-if="speciesTypeKey==1 || speciesTypeKey==3 || speciesTypeKey==2" ><div ng-if="oKey==1">Genome Viewer</div></div></td>
                                    <td align="center" style="cursor:pointer;font-size:16px;font-weight:400;" ng-click="rgd.toolSubmit('excel')"><div ng-if="speciesTypeKey==1 || speciesTypeKey==3" ><div ng-if="oKey==1">Damaging Variants</div></div></td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td align="center"><div ng-if="oKey==1"> <img src="/rgdweb/common/images/annotCompare.png" border="0" style="cursor:pointer;padding:5px; margin-right:0px; border:1px solid black;" ng-click="rgd.toolSubmit('annotCompare')"/></div><div ng-if="oKey!=1">Annotation Comparison<br>unavailable</div></td>
                                    <td align="center"><div ng-if="oKey==1"> <img src="/rgdweb/common/images/olga.png" border="0" style="cursor:pointer;padding:5px; margin-bottom:5px; border:1px solid black;" ng-click="rgd.toolSubmit('olga')"/></div><div ng-if="oKey!=1">OLGA<br>unavailable</div></td>
                                    <td align="center"> <img src="/rgdweb/common/images/excel.png" border="0" style="cursor:pointer;padding:5px; margin-right:0px; border:1px solid black;" ng-click="rgd.toolSubmit('excel')"/></td>
                                </tr>
                                <tr>
                                    <td align="center" style="cursor:pointer;font-size:16px;font-weight:400;" ng-click="rgd.toolSubmit('annotCompare')"><div ng-if="oKey==1">Annotation Comparison</div></td>
                                    <td align="center" style="cursor:pointer;font-size:16px;font-weight:400;" ng-click="rgd.toolSubmit('olga')"><div ng-if="oKey==1">OLGA</div></td>
                                    <td align="center" style="cursor:pointer;font-size:16px;font-weight:400;" ng-click="rgd.toolSubmit('excel')">Excel (Download)</td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                   <td align="center"><div ng-if="oKey==1"> <img src="/rgdweb/common/images/gaTool.png" border="0" style="cursor:pointer;padding:5px; margin-bottom:5px; border:1px solid black;" ng-click="rgd.toolSubmit('enrichment')"/></div><div ng-if="oKey!=1">Gene Enrichment<br>unavailable</div></td>
                                    </tr>
                                <tr>
                                    <td align="center" style="cursor:pointer;font-size:16px;font-weight:400;" ng-click="rgd.toolSubmit('enrichment')"><div ng-if="oKey==1">Gene Enrichment</div></td>


                                </tr>
                            </table>

                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>


        <!-- end tool navigation -->









        <!--
                            <div style="font-weight:700;text-decoration: underline;">Saved Lists</div>

                                            <div ng-repeat="list in myLists" style="display:table-row;">

                                             <div style="display: table-cell; float:left; margin-right:10px; min-width: 50px; font-weight:700;">{{ list.name }}:</div> <div style="width:100%;"> {{ list.desc }}</div>
                                             <div style="display: table-cell; float:left; margin-right:10px; min-width: 50px;"><a href="javascript:void(0)" ng-click="rgd.loadGeneList(list.id)">Preview</a></div>
                                             <div style="display: table-cell; float:left;  margin-right:10px; min-width: 40px;"><a href="{{ list.link }}&lid={{list.id}}">Edit</a></div>
                                             <div style="display: table-cell; float:left;  margin-right:10px; min-width: 50px;" ><a href="javascript:void(0)" ng-click="rgd.removeList(list.id)">Remove</a></div>
                                             <div style="display: table-cell; float:left;  margin-right:10px; min-width: 50px; padding-bottom:10px;" ><input type="button" value="Import" ng-click="rgd.import(list.id)" data-dismiss="modal"/></div>



                                            </div>
                            </div>
                            -->




<table class="wrapperTable" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>

            <div id="headWrapper">





                <div class="top-bar">
                    <table width="100%" border="0" class="headerTable" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="left" style="color:white;" rowspan="3" width="10">

                                <div ><a class="homeLink" href="/wg/home"><img style="border:3px solid #2865A3;" border="0" src="/rgdweb//common/images/rgd_logo.jpg"></a></div>

                            </td>

                            <td align="right" style="color:white;" valign="center" colspan="3">

                            <a href="/registration-entry.shtml">Submit Data</a>&nbsp;|&nbsp;
                            <a href="/wg/help3/">Help</a>&nbsp;|&nbsp;
                            <a href="/wg/home/rgd_rat_community_videos/">Video Tutorials</a>&nbsp;|&nbsp;
                            <a href="/wg/news2/">News</a>&nbsp;|&nbsp;
                            <a href="/wg/home/rat-genome-database-publications">Publications</a>&nbsp;|&nbsp;

                            <a href="https://download.rgd.mcw.edu">Download</a>&nbsp;|&nbsp;
                            <a href="https://rest.rgd.mcw.edu/rgdws/swagger-ui.html">REST API</a>&nbsp;|&nbsp;
                            <a href="/wg/citing-rgd">Citing RGD</a>&nbsp;|&nbsp;
                            <a href="/contact/index.shtml">Contact</a>&nbsp;&nbsp;&nbsp;

                            <input type="button" class="btn btn-info btn-sm"  value="{{username}}" ng-click="rgd.loadMyRgd($event)" style="background-color:#2B84C8;padding:1px 10px;font-size:12px;line-height:1.5;border-radius:3px"/>
                        </td>

                    </tr>

                    <tr>
                        <td colspan="2">



                            <div class="rgd-navbar">
                                <div class="rgd-dropdown">
                                    <button class="rgd-dropbtn" style="cursor:pointer" onclick="javascript:location.href='/wg'">Home
                                        <i class="fa fa-caret-down"></i>
                                    </button>

                                    <div class="rgd-dropdown-content">
                                        <a href="/wg/general-search/">Search RGD</a>
                                        <a href="/wg/grants/">Grant Resources</a>
                                        <a href="/wg/citing-rgd/">Citing RGD</a>
                                        <a href="/wg/about-us/">About Us</a>
                                        <a href="/contact/index.shtml">Contact Us</a>
                                    </div>
                                </div>
                                <div class="rgd-dropdown">
                                    <button class="rgd-dropbtn" style="cursor:pointer" onclick="javascript:location.href='/wg/data-menu/'">Data
                                        <i class="fa fa-caret-down"></i>
                                    </button>

                                    <div class="rgd-dropdown-content">
                                        <a href="/rgdweb/search/genes.html?100">Genes</a>
                                        <a href="/rgdweb/search/qtls.html?100">QTLs</a>
                                        <a href="/rgdweb/search/strains.html?100">Strains</a>
                                        <a href="/rgdweb/search/markers.html?100">Markers</a>
                                        <a href="/rgdweb/report/genomeInformation/genomeInformation.html">Genome Information</a>
                                        <a href="/rgdweb/ontology/search.html">Ontologies</a>
                                        <a href="/rgdweb/search/cellLines.html">Cell Lines</a>
                                        <a href="/rgdweb/search/references.html?100">References</a>
                                        <a href="https://download.rgd.mcw.edu">Download</a>
                                        <a href="/registration-entry.shtml">Submit Data</a>
                                    </div>
                                </div>
                                <div class="rgd-dropdown">
                                    <button class="rgd-dropbtn" style="cursor:pointer" onclick="javascript:location.href='/wg/tool-menu/'">Analysis & Visualization
                                        <i class="fa fa-caret-down"></i>
                                    </button>

                                    <div class="rgd-dropdown-content">
                                        <a href="/QueryBuilder" >OntoMate (Literature Search)</a>
                                        <a href="/jbrowse/">JBrowse (Genome Browser)</a>
                                        <a href="/rgdweb/enrichment/start.html">Multi-Ontology Enrichment (MOET)</a>
                                        <a href="/rgdweb/ortholog/start.html">Gene-Ortholog Location Finder (GOLF)</a>
                                        <a href="/rgdweb/front/config.html">Variant Visualizer</a>
                                        <a href="/rgdweb/cytoscape/query.html">InterViewer (Protein-Protein Interactions)</a>
                                        <a href="/rgdweb/phenominer/home.jsp">PhenoMiner (Quantitative Phenotypes)</a>
                                        <a href="/rgdweb/ga/start.jsp">Gene Annotator</a>
                                        <a href="/rgdweb/generator/list.html">OLGA (Gene List Generator)</a>
                                        <a href="http://ratmine.mcw.edu/ratmine/begin.do">RatMine</a>
                                        <a href="/rgdweb/gTool/Gviewer.jsp">GViewer (Genome Viewer)</a>
                                        <a href="/rgdweb/overgo/find.html">Overgo Probe Designer</a>
                                        <a href="/ACPHAPLOTYPER/">ACP Haplotyper</a>
                                        <a href="/GENOMESCANNER/">Genome Scanner</a>
                                    </div>
                                </div>
                                <div class="rgd-dropdown">
                                    <button class="rgd-dropbtn" style="cursor:pointer" onclick="javascript:location.href='/wg/portals/'">Diseases
                                        <i class="fa fa-caret-down"></i>
                                    </button>

                                    <!--
                                    <div class="rgd-dropdown-content">
                                        <a href="/rgdCuration/?module=portal&func=show&name=aging">Aging & Age-Related Disease</a>
                                        <a href="/rgdCuration/?module=portal&func=show&name=cancer">Cancer</a>
                                        <a href="/rgdCuration/?module=portal&func=show&name=cardio">Cardiovascular Disease</a>
                                        <a href="/rgdCuration/?module=portal&func=show&name=develop">Developmental Disease</a>
                                        <a href="/rgdCuration/?module=portal&func=show&name=diabetes">Diabetes</a>
                                        <a href="/rgdCuration/?module=portal&func=show&name=blood">Hematologic Disease</a>
                                        <a href="/rgdCuration/?module=portal&func=show&name=immune">Immune & Inflammatory Disease</a>
                                        <a href="/rgdCuration/?module=portal&func=show&name=nuro">Neurological Disease</a>
                                        <a href="/rgdCuration/?module=portal&func=show&name=obesity">Obesity & Metabolic Syndrome</a>
                                        <a href="/rgdCuration/?module=portal&func=show&name=renal">Renal Disease</a>
                                        <a href="/rgdCuration/?module=portal&func=show&name=respir">Respiratory Disease</a>
                                        <a href="/rgdCuration/?module=portal&func=show&name=sensory">Sensory Organ Disease</a>
                                    </div>
                                    -->

                                    <div class="rgd-dropdown-content">
                                        <a href="/rgdweb/portal/home.jsp?p=1">Aging & Age-Related Disease</a>
                                        <a href="/rgdweb/portal/home.jsp?p=2">Cancer</a>
                                        <a href="/rgdweb/portal/home.jsp?p=3">Cardiovascular Disease</a>
                                        <a href="/rgdweb/portal/home.jsp?p=14">COVID-19</a>
                                        <a href="/rgdweb/portal/home.jsp?p=12">Developmental Disease</a>
                                        <a href="/rgdweb/portal/home.jsp?p=4">Diabetes</a>
                                        <a href="/rgdweb/portal/home.jsp?p=5">Hematologic Disease</a>
                                        <a href="/rgdweb/portal/home.jsp?p=6">Immune & Inflammatory Disease</a>
                                        <a href="/rgdweb/portal/home.jsp?p=13">Liver Disease</a>
                                        <a href="/rgdweb/portal/home.jsp?p=7">Neurological Disease</a>
                                        <a href="/rgdweb/portal/home.jsp?p=8">Obesity & Metabolic Syndrome</a>
                                        <a href="/rgdweb/portal/home.jsp?p=9">Renal Disease</a>
                                        <a href="/rgdweb/portal/home.jsp?p=10">Respiratory Disease</a>
                                        <a href="/rgdweb/portal/home.jsp?p=11">Sensory Organ Disease</a>
                                    </div>

                                </div>
                                <div class="rgd-dropdown">
                                    <button class="rgd-dropbtn" style="cursor:pointer" onclick="javascript:location.href='/wg/physiology/'">Phenotypes & Models
                                        <i class="fa fa-caret-down"></i>
                                    </button>

                                    <div class="rgd-dropdown-content">
                                        <a href="/rgdweb/models/findModels.html">Find Models&nbsp;&nbsp;&nbsp;<span style="font-weight: bold;color:red">new</span></a>
                                        <a href="/rgdweb/models/allModels.html">Genetic Models</a>
                                        <a href="/wg/autism-rat-model-resource/">Autism Models</a>
                                        <a href="/rgdweb/phenominer/home.jsp">PhenoMiner (Quantitative Phenotypes)</a>
                                        <a href="/rgdweb/phenominer/phenominerExpectedRanges/views/home.html">Expected Ranges (Quantitative Phenotype)</a>
                                        <a href="/rgdweb/pa/termCompare.html?term1=RS%3A0000457&term2=CMO%3A0000000&countType=rec&species=3">PhenoMiner Term Comparison</a>
                                        <a href="/wg/hrdp_panel/">Hybrid Rat Diversity Panel</a>
                                        <a href="/wg/phenotype-data13/">Phenotypes</a>
                                        <a href="/wg/gerrc/">GERRC (Gene Editing Rat Resource Center)</a>
                                        <a href="/wg/physiology/additionalmodels/">Phenotypes in Other Animal Models</a>
                                        <a href="/wg/strain-maintenance/">Animal Husbandry</a>
                                        <a href="/wg/physiology/strain-medical-records/">Strain Medical Records</a>
                                        <a href="/wg/phylogenetics/">Phylogenetics</a>
                                        <a href="/wg/strain-availability/">Strain Availability</a>
                                        <a href="ftp://ftp.rgd.mcw.edu/pub/data_release/Hi-res_Rat_Calendars/">Calendar</a>
                                        <a href="/wg/physiology/rats101/">Rats 101</a>
                                        <a href="/wg/photos-and-images/community-submissions/">Submissions</a>
                                        <a href="/wg/photos-and-images/physgen-photo-archive2/">Photo Archive</a>
                                    </div>
                                </div>

                                <a href="/wg/home/pathway2/">Pathways</a>

                                <div class="rgd-dropdown">
                                    <button class="rgd-dropbtn" style="cursor:pointer" onclick="javascript:location.href='/wg/com-menu/'">Community
                                        <i class="fa fa-caret-down"></i>
                                    </button>

                                    <div class="rgd-dropdown-content">
                                        <a href="http://mailman.mcw.edu/mailman/listinfo/rat-forum">Rat Community Forum</a>
                                        <a href="/wg/com-menu/directory-of-rat-laboratories2/">Directory of Rat Laboratories</a>
                                        <a href="/wg/home/rgd_rat_community_videos/">Video Tutorials</a>
                                        <a href="/wg/news2/">News</a>
                                        <a href="/wg/home/rat-genome-database-publications/">RGD Publications</a>
                                        <a href="/wg/com-menu/poster_archive/">RGD Poster Archive</a>
                                        <a href="/nomen/nomen.shtml">Nomenclature Guidelines</a>
                                        <a href="/wg/resource-links/">Resource Links</a>
                                        <a href="/wg/resource-links/laboratory-resources/">Laboratory Resources</a>
                                        <a href="/wg/resource-links/employment-resources/">Employment Resources</a>
                                    </div>
                                </div>
                            </div>





                        </td>

                        </tr>
                        <tr>
                        <td align="center" style="background-color:#2865A3;">
                            <div id="app" style="padding-top:10px;">

                                            <div class="container-fluid" id="container" tyle="background-color:#d6e5ff;padding-top:13px;padding-bottom:0px;">
                                                <div class="row">
                                                    <form  name="elasticSearchForm" class="form-inline" action="/rgdweb/elasticResults.html" id="elasticSearchForm" role="search" method="post">
                                                        <input type="hidden" name="log" value="true" />
                                                        <table border="0">
                                                            <tr>
                                                                <input type="hidden" name="category" id="category" value="General"/>
                                                                <td>
                                                                    <input style="height:20px;" type=text class="searchgroup" id="term" name=term size="40" placeholder="Enter Search Term..." value="" style="border:1px solid #2865A3">
                                                                </td>
                                                                <td>
                                                                    <!--<input type="image" src="/rgdweb/common/images/searchGlass.gif" class="searchButtonSmall"/>-->
                                                                    <input class="btn btn-info btn-sm" style="background-color:#2B84C8;padding:1px 10px;font-size:12px;line-height:1.5;border-radius:3px" type="submit" value="Search RGD"/>

                                                                </td>
                                                                <td colspan="2"  align="center"><br><a href="/rgdweb/generator/list.html" >Advanced Search (OLGA)</a><br>&nbsp;&nbsp; <a href="/QueryBuilder" >OntoMate (Literature Search) </a></td>
                                                            </tr>
                                                        </table>

                                                    </form>
                                                </div>
                                                </div>

                            </div>
                            </td>
                            <td>
                                <a href="https://www.facebook.com/pg/RatGenomeDatabase/posts/"><img src="/rgdweb/common/images/social/facebook-20.png"/></a>
                                <a href="https://twitter.com/ratgenome"><img src="/rgdweb/common/images/social/twitter-20.png"/></a>
                                <a href="https://www.linkedin.com/company/ratgenome/about/"><img src="/rgdweb/common/images/social/linkedin-20.png"/></a>
                                <a href="https://www.youtube.com/channel/UCMpex8AfXd_JSTH3DIxMGFw?view_as=subscriber"><img src="/rgdweb/common/images/social/youtube-20.png"/></a>

                        </td>
                    </tr>


                    </table>
                </div>

                <input type="hidden" id="speciesType" value="">




            </div>





            </DIV>
            <!--end headwrapper -->
            </div>

            <script>
                if (location.href.indexOf("") == -1 &&
                        location.href.indexOf("https://www.rgd.mcw.edu") == -1 &&
                        location.href.indexOf("osler") == -1 &&
                        location.href.indexOf("horan") == -1 &&
                        location.href.indexOf("owen") == -1 &&
                        location.href.indexOf("hancock") == -1 &&
                        location.href.indexOf("preview.rgd.mcw.edu") == -1) {

                    document.getElementById("curation-top").style.visibility='visible';
                }
            </script>

        </td></tr>
</table>


<div id="mainBody">
    <div id="contentArea" class="content-area">
        <table cellpadding="5" border=0 align="center" width="100%">
            <tr>
                <td colspan="3" align="left" valign="top">




