<?php

namespace BungieNetPlatform;

use Cola\Object;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request as PsrRequest;
use GuzzleHttp\Psr7\Response as PsrResponse;
use BungieNetPlatform\BungieNet;
use BungieNetPlatform\Services\Destiny\DestinyService;
use BungieNetPlatform\Services\Forum\ForumService;
use BungieNetPlatform\Services\Group\GroupService;
use BungieNetPlatform\Services\User\UserService;
use BungieNetPlatform\Exceptions\BungieAuthenticationException;

/**
 * Platform
 * 
 * @link http://bungienetplatform.wikia.com/wiki/API_Details
 * @since version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
class Platform extends Object {

	/**
	 * @var string
	 */
	const API_KEY_HEADER_NAME = 'X-API-Key';
	
	/**
	 * @var string
	 */
	const CSRF_HEADER_NAME = 'X-CSRF';
	
	/**
	 * API key used to access the platform
	 * @var string
	 */
	protected $_ApiKey;
	
	/**
	 * User to use when making use of private endpoints
	 * @var PlatformUser 
	 */
	protected $_User;
	
	/**
	 * Whether to query the platform in the context of a user
	 * @var bool
	 */
	protected $_InUserContext = false;
	
	/**
	 * @var DestinyService
	 */
	public $DestinyService;
	
	/**
	 * @var UserService
	 */
	public $UserService;
	
	/**
	 * @var GroupService
	 */
	public $GroupService;
	
	/**
	 * @var ForumService
	 */
	public $ForumService;
	
	
	/**
	 * Creates a new Platform instance
	 * 
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @param string $key
	 * @author dazarobbo <dazarobbo@live.com>
	 */
	public function __construct($key = null) {
		$this->setKey($key);
		$this->DestinyService = new DestinyService($this);
		$this->UserService = new UserService($this);
		$this->GroupService = new GroupService($this);
		$this->ForumService = new ForumService($this);
	}
	
	/**
	 * Makes a requrst to bungie.net given a PSR7 request
	 * 
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param PsrRequest $request
	 * @return PsrResponse
	 * @throws Exceptions\PlatformRequestException
	 */
	public function httpRequest(PsrRequest $request){
		
		$options = [
			'decode_content' => 'gzip',
			'debug' => true
		];
		
		//Add base bungie.net URI details
		$request = $request->withUri(
					BungieNet::getBaseUri()->withPath(
							$request->getUri()->getPath()));
				
		//Add API key header
		if($this->_ApiKey !== null){
			$request = $request->withAddedHeader(
					static::API_KEY_HEADER_NAME, $this->_ApiKey);
		}
		
		//Add cookie and CSRF info if requesting as a user
		if($this->_InUserContext){
			$options['cookies'] = $this->_User->getCookieJar();
			$request = $request->withAddedHeader(static::CSRF_HEADER_NAME,
					$this->_User->getCsrfToken());
		}
				
		try{
			$client = new GuzzleClient($options);
			$response = $client->send($request);
		}
		catch(\Exception $ex){
			throw new Exceptions\PlatformRequestException(
					'Platform HTTP request failed', 0, $ex);
		}
		
		if($response->getStatusCode() !== 200){
			throw new Exceptions\PlatformRequestException(\sprintf(
					'Request returned HTTP %d', $response->getStatusCode()),
					$response->getStatusCode());
		}
		
		return $response;
		
	}

	/**
	 * Sets a new key
	 * @param string $key
	 * @return \BungieNetPlatform\Platform
	 */
	public function setKey($key){
		$this->_ApiKey = $key;
		return $this;
	}
	
	/**
	 * Returns the currently set key
	 * @return string
	 */
	public function getKey(){
		return $this->_ApiKey;
	}

	/**
	 * Sets the user to use to make requests to private endpoints
	 * @see http://bungienetplatform.wikia.com/wiki/Category:PrivateEndpoint
	 * @param \BungieNetPlatform\PlatformUser $user
	 * @return \BungieNetPlatform\Platform
	 */
	public function setUser(PlatformUser $user){
		$this->_User = $user;
		return $this;
	}
	
	/**
	 * Returns the currently set user
	 * @return PlatformUser
	 */
	public function &getUser(){
		return $this->_User;
	}
	
	/**
	 * Authenticates the set user
	 * @return \BungieNetPlatform\Platform
	 */
	public function authenticateUser(){
		
		$this->_User->authenticate();
		
		if(!$this->_User->isAuthorised()){
			throw new BungieAuthenticationException('Unauthorised bungie.net user');
		}
		
		return $this;
		
	}
	
	/**
	 * Whether the platform will make a request as a user
	 * @return bool
	 */
	public function inUserContext(){
		return $this->_InUserContext;
	}
	
	/**
	 * Sets whether or not to make requests as a user
	 * @param bool $var
	 * @return \BungieNetPlatform\Platform
	 */
	public function setUserContext($var = true){
		$this->_InUserContext = $var ? true : false;
		return $this;
	}
	
	/**
	 * Returns a compatible exception type (if any) when given
	 * a platform response
	 * 
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param PlatformResponse $response
	 * @return mixed derived exception type
	 */
	public static function getResponseException(PlatformResponse $response){
		
		switch($response->getErrorCode()){

			case 0:
			case 1:
				return null;

			case 2:
				return new Exceptions\Platform\TransportException($response->getMessage());

			case 3:
				return new Exceptions\Platform\UnhandledException($response->getMessage());

			case 4:
				return new Exceptions\Platform\NotImplementedException($response->getMessage());

			case 5:
				return new Exceptions\Platform\SystemDisabledException($response->getMessage());

			case 6:
				return new Exceptions\Platform\FailedToLoadAvailableLocalesConfigurationException($response->getMessage());

			case 7:
				return new Exceptions\Platform\ParameterParseFailureException($response->getMessage());

			case 8:
				return new Exceptions\Platform\ParameterInvalidRangeException($response->getMessage());

			case 9:
				return new Exceptions\Platform\BadRequestException($response->getMessage());

			case 10:
				return new Exceptions\Platform\AuthenticationInvalidException($response->getMessage());

			case 11:
				return new Exceptions\Platform\DataNotFoundException($response->getMessage());

			case 12:
				return new Exceptions\Platform\InsufficientPrivilegesException($response->getMessage());

			case 13:
				return new Exceptions\Platform\DuplicateException($response->getMessage());

			case 14:
				return new Exceptions\Platform\UnknownSqlResultException($response->getMessage());

			case 15:
				return new Exceptions\Platform\ValidationErrorException($response->getMessage());

			case 16:
				return new Exceptions\Platform\ValidationMissingFieldErrorException($response->getMessage());

			case 17:
				return new Exceptions\Platform\ValidationInvalidInputErrorException($response->getMessage());

			case 18:
				return new Exceptions\Platform\InvalidParametersException($response->getMessage());

			case 19:
				return new Exceptions\Platform\ParameterNotFoundException($response->getMessage());

			case 20:
				return new Exceptions\Platform\UnhandledHttpException($response->getMessage());

			case 21:
				return new Exceptions\Platform\NotFoundException($response->getMessage());

			case 22:
				return new Exceptions\Platform\WebAuthModuleAsyncFailedException($response->getMessage());

			case 23:
				return new Exceptions\Platform\InvalidReturnValueException($response->getMessage());

			case 24:
				return new Exceptions\Platform\UserBannedException($response->getMessage());

			case 25:
				return new Exceptions\Platform\InvalidPostBodyException($response->getMessage());

			case 26:
				return new Exceptions\Platform\MissingPostBodyException($response->getMessage());

			case 27:
				return new Exceptions\Platform\ExternalServiceTimeoutException($response->getMessage());

			case 28:
				return new Exceptions\Platform\ValidationLengthErrorException($response->getMessage());

			case 29:
				return new Exceptions\Platform\ValidationRangeErrorException($response->getMessage());

			case 30:
				return new Exceptions\Platform\JsonDeserializationErrorException($response->getMessage());

			case 31:
				return new Exceptions\Platform\ThrottleLimitExceededException($response->getMessage());

			case 32:
				return new Exceptions\Platform\ValidationTagErrorException($response->getMessage());

			case 33:
				return new Exceptions\Platform\ValidationProfanityErrorException($response->getMessage());

			case 34:
				return new Exceptions\Platform\ValidationUrlFormatErrorException($response->getMessage());

			case 35:
				return new Exceptions\Platform\ThrottleLimitExceededMinutesException($response->getMessage());

			case 36:
				return new Exceptions\Platform\ThrottleLimitExceededMomentarilyException($response->getMessage());

			case 37:
				return new Exceptions\Platform\ThrottleLimitExceededSecondsException($response->getMessage());

			case 38:
				return new Exceptions\Platform\ExternalServiceUnknownException($response->getMessage());

			case 39:
				return new Exceptions\Platform\ValidationWordLengthErrorException($response->getMessage());

			case 40:
				return new Exceptions\Platform\ValidationInvisibleUnicodeException($response->getMessage());

			case 41:
				return new Exceptions\Platform\ValidationBadNamesException($response->getMessage());

			case 42:
				return new Exceptions\Platform\ExternalServiceFailedException($response->getMessage());

			case 43:
				return new Exceptions\Platform\ServiceRetiredException($response->getMessage());

			case 44:
				return new Exceptions\Platform\UnknownSqlException($response->getMessage());

			case 45:
				return new Exceptions\Platform\UnsupportedLocaleException($response->getMessage());

			case 46:
				return new Exceptions\Platform\InvalidPageNumberException($response->getMessage());

			case 47:
				return new Exceptions\Platform\MaximumPageSizeExceededException($response->getMessage());

			case 48:
				return new Exceptions\Platform\ServiceUnsupportedException($response->getMessage());

			case 49:
				return new Exceptions\Platform\ValidationMaximumUnicodeCombiningCharactersException($response->getMessage());

			case 90:
				return new Exceptions\Platform\UnableToUnPairMobileAppException($response->getMessage());

			case 91:
				return new Exceptions\Platform\UnableToPairMobileAppException($response->getMessage());

			case 92:
				return new Exceptions\Platform\CannotUseMobileAuthWithNonMobileProviderException($response->getMessage());

			case 93:
				return new Exceptions\Platform\MissingDeviceCookieException($response->getMessage());

			case 94:
				return new Exceptions\Platform\FacebookTokenExpiredException($response->getMessage());

			case 95:
				return new Exceptions\Platform\AuthTicketRequiredException($response->getMessage());

			case 96:
				return new Exceptions\Platform\CookieContextRequiredException($response->getMessage());

			case 97:
				return new Exceptions\Platform\UnknownAuthenticationErrorException($response->getMessage());

			case 98:
				return new Exceptions\Platform\BungieNetAccountCreationRequiredException($response->getMessage());

			case 99:
				return new Exceptions\Platform\WebAuthRequiredException($response->getMessage());

			case 100:
				return new Exceptions\Platform\ContentUnknownSqlResultException($response->getMessage());

			case 101:
				return new Exceptions\Platform\ContentNeedUniquePathException($response->getMessage());

			case 102:
				return new Exceptions\Platform\ContentSqlException($response->getMessage());

			case 103:
				return new Exceptions\Platform\ContentNotFoundException($response->getMessage());

			case 104:
				return new Exceptions\Platform\ContentSuccessWithTagAddFailException($response->getMessage());

			case 105:
				return new Exceptions\Platform\ContentSearchMissingParametersException($response->getMessage());

			case 106:
				return new Exceptions\Platform\ContentInvalidIdException($response->getMessage());

			case 107:
				return new Exceptions\Platform\ContentPhysicalFileDeletionErrorException($response->getMessage());

			case 108:
				return new Exceptions\Platform\ContentPhysicalFileCreationErrorException($response->getMessage());

			case 109:
				return new Exceptions\Platform\ContentPerforceSubmissionErrorException($response->getMessage());

			case 110:
				return new Exceptions\Platform\ContentPerforceInitializationErrorException($response->getMessage());

			case 111:
				return new Exceptions\Platform\ContentDeploymentPackageNotReadyErrorException($response->getMessage());

			case 112:
				return new Exceptions\Platform\ContentUploadFailedException($response->getMessage());

			case 113:
				return new Exceptions\Platform\ContentTooManyResultsException($response->getMessage());

			case 115:
				return new Exceptions\Platform\ContentInvalidStateException($response->getMessage());

			case 116:
				return new Exceptions\Platform\ContentNavigationParentNotFoundException($response->getMessage());

			case 117:
				return new Exceptions\Platform\ContentNavigationParentUpdateErrorException($response->getMessage());

			case 118:
				return new Exceptions\Platform\DeploymentPackageNotEditableException($response->getMessage());

			case 119:
				return new Exceptions\Platform\ContentValidationErrorException($response->getMessage());

			case 120:
				return new Exceptions\Platform\ContentPropertiesValidationErrorException($response->getMessage());

			case 121:
				return new Exceptions\Platform\ContentTypeNotFoundException($response->getMessage());

			case 122:
				return new Exceptions\Platform\DeploymentPackageNotFoundException($response->getMessage());

			case 123:
				return new Exceptions\Platform\ContentSearchInvalidParametersException($response->getMessage());

			case 124:
				return new Exceptions\Platform\ContentItemPropertyAggregationErrorException($response->getMessage());

			case 125:
				return new Exceptions\Platform\DeploymentPackageFileNotFoundException($response->getMessage());

			case 126:
				return new Exceptions\Platform\ContentPerforceFileHistoryNotFoundException($response->getMessage());

			case 127:
				return new Exceptions\Platform\ContentAssetZipCreationFailureException($response->getMessage());

			case 128:
				return new Exceptions\Platform\ContentAssetZipCreationBusyException($response->getMessage());

			case 129:
				return new Exceptions\Platform\ContentProjectNotFoundException($response->getMessage());

			case 130:
				return new Exceptions\Platform\ContentFolderNotFoundException($response->getMessage());

			case 131:
				return new Exceptions\Platform\ContentPackagesInconsistentException($response->getMessage());

			case 132:
				return new Exceptions\Platform\ContentPackagesInvalidStateException($response->getMessage());

			case 133:
				return new Exceptions\Platform\ContentPackagesInconsistentTypeException($response->getMessage());

			case 134:
				return new Exceptions\Platform\ContentCannotDeletePackageException($response->getMessage());

			case 135:
				return new Exceptions\Platform\ContentLockedForChangesException($response->getMessage());

			case 136:
				return new Exceptions\Platform\ContentFileUploadFailedException($response->getMessage());

			case 137:
				return new Exceptions\Platform\ContentNotReviewedException($response->getMessage());

			case 138:
				return new Exceptions\Platform\ContentPermissionDeniedException($response->getMessage());

			case 139:
				return new Exceptions\Platform\ContentInvalidExternalUrlException($response->getMessage());

			case 140:
				return new Exceptions\Platform\ContentExternalFileCannotBeImportedLocallyException($response->getMessage());

			case 141:
				return new Exceptions\Platform\ContentTagSaveFailureException($response->getMessage());

			case 142:
				return new Exceptions\Platform\ContentPerforceUnmatchedFileErrorException($response->getMessage());

			case 143:
				return new Exceptions\Platform\ContentPerforceChangelistResultNotFoundException($response->getMessage());

			case 144:
				return new Exceptions\Platform\ContentPerforceChangelistFileItemsNotFoundException($response->getMessage());

			case 145:
				return new Exceptions\Platform\ContentPerforceInvalidRevisionErrorException($response->getMessage());

			case 146:
				return new Exceptions\Platform\ContentUnloadedSaveResultException($response->getMessage());

			case 147:
				return new Exceptions\Platform\ContentPropertyInvalidNumberException($response->getMessage());

			case 148:
				return new Exceptions\Platform\ContentPropertyInvalidUrlException($response->getMessage());

			case 149:
				return new Exceptions\Platform\ContentPropertyInvalidDateException($response->getMessage());

			case 150:
				return new Exceptions\Platform\ContentPropertyInvalidSetException($response->getMessage());

			case 151:
				return new Exceptions\Platform\ContentPropertyCannotDeserializeException($response->getMessage());

			case 152:
				return new Exceptions\Platform\ContentRegexValidationFailOnPropertyException($response->getMessage());

			case 153:
				return new Exceptions\Platform\ContentMaxLengthFailOnPropertyException($response->getMessage());

			case 154:
				return new Exceptions\Platform\ContentPropertyUnexpectedDeserializationErrorException($response->getMessage());

			case 155:
				return new Exceptions\Platform\ContentPropertyRequiredException($response->getMessage());

			case 156:
				return new Exceptions\Platform\ContentCannotCreateFileException($response->getMessage());

			case 157:
				return new Exceptions\Platform\ContentInvalidMigrationFileException($response->getMessage());

			case 158:
				return new Exceptions\Platform\ContentMigrationAlteringProcessedItemException($response->getMessage());

			case 159:
				return new Exceptions\Platform\ContentPropertyDefinitionNotFoundException($response->getMessage());

			case 160:
				return new Exceptions\Platform\ContentReviewDataChangedException($response->getMessage());

			case 161:
				return new Exceptions\Platform\ContentRollbackRevisionNotInPackageException($response->getMessage());

			case 162:
				return new Exceptions\Platform\ContentItemNotBasedOnLatestRevisionException($response->getMessage());

			case 163:
				return new Exceptions\Platform\ContentUnauthorizedException($response->getMessage());

			case 164:
				return new Exceptions\Platform\ContentCannotCreateDeploymentPackageException($response->getMessage());

			case 165:
				return new Exceptions\Platform\ContentUserNotFoundException($response->getMessage());

			case 166:
				return new Exceptions\Platform\ContentLocalePermissionDeniedException($response->getMessage());

			case 167:
				return new Exceptions\Platform\ContentInvalidLinkToInternalEnvironmentException($response->getMessage());

			case 168:
				return new Exceptions\Platform\ContentInvalidBlacklistedContentException($response->getMessage());

			case 200:
				return new Exceptions\Platform\UserNonUniqueNameException($response->getMessage());

			case 201:
				return new Exceptions\Platform\UserManualLinkingStepRequiredException($response->getMessage());

			case 202:
				return new Exceptions\Platform\UserCreateUnknownSqlResultException($response->getMessage());

			case 203:
				return new Exceptions\Platform\UserCreateUnknownSqlException($response->getMessage());

			case 204:
				return new Exceptions\Platform\UserMalformedMembershipIdException($response->getMessage());

			case 205:
				return new Exceptions\Platform\UserCannotFindRequestedUserException($response->getMessage());

			case 206:
				return new Exceptions\Platform\UserCannotLoadAccountCredentialLinkInfoException($response->getMessage());

			case 207:
				return new Exceptions\Platform\UserInvalidMobileAppTypeException($response->getMessage());

			case 208:
				return new Exceptions\Platform\UserMissingMobilePairingInfoException($response->getMessage());

			case 209:
				return new Exceptions\Platform\UserCannotGenerateMobileKeyWhileUsingMobileCredentialException($response->getMessage());

			case 210:
				return new Exceptions\Platform\UserGenerateMobileKeyExistingSlotCollisionException($response->getMessage());

			case 211:
				return new Exceptions\Platform\UserDisplayNameMissingOrInvalidException($response->getMessage());

			case 212:
				return new Exceptions\Platform\UserCannotLoadAccountProfileDataException($response->getMessage());

			case 213:
				return new Exceptions\Platform\UserCannotSaveUserProfileDataException($response->getMessage());

			case 214:
				return new Exceptions\Platform\UserEmailMissingOrInvalidException($response->getMessage());

			case 215:
				return new Exceptions\Platform\UserTermsOfUseRequiredException($response->getMessage());

			case 216:
				return new Exceptions\Platform\UserCannotCreateNewAccountWhileLoggedInException($response->getMessage());

			case 217:
				return new Exceptions\Platform\UserCannotResolveCentralAccountException($response->getMessage());

			case 218:
				return new Exceptions\Platform\UserInvalidAvatarException($response->getMessage());

			case 219:
				return new Exceptions\Platform\UserMissingCreatedUserResultException($response->getMessage());

			case 220:
				return new Exceptions\Platform\UserCannotChangeUniqueNameYetException($response->getMessage());

			case 221:
				return new Exceptions\Platform\UserCannotChangeDisplayNameYetException($response->getMessage());

			case 222:
				return new Exceptions\Platform\UserCannotChangeEmailException($response->getMessage());

			case 223:
				return new Exceptions\Platform\UserUniqueNameMustStartWithLetterException($response->getMessage());

			case 224:
				return new Exceptions\Platform\UserNoLinkedAccountsSupportFriendListingsException($response->getMessage());

			case 225:
				return new Exceptions\Platform\UserAcknowledgmentTableFullException($response->getMessage());

			case 300:
				return new Exceptions\Platform\MessagingUnknownErrorException($response->getMessage());

			case 301:
				return new Exceptions\Platform\MessagingSelfErrorException($response->getMessage());

			case 302:
				return new Exceptions\Platform\MessagingSendThrottleException($response->getMessage());

			case 303:
				return new Exceptions\Platform\MessagingNoBodyException($response->getMessage());

			case 304:
				return new Exceptions\Platform\MessagingTooManyUsersException($response->getMessage());

			case 305:
				return new Exceptions\Platform\MessagingCanNotLeaveConversationException($response->getMessage());

			case 306:
				return new Exceptions\Platform\MessagingUnableToSendException($response->getMessage());

			case 307:
				return new Exceptions\Platform\MessagingDeletedUserForbiddenException($response->getMessage());

			case 308:
				return new Exceptions\Platform\MessagingCannotDeleteExternalConversationException($response->getMessage());

			case 309:
				return new Exceptions\Platform\MessagingGroupChatDisabledException($response->getMessage());

			case 310:
				return new Exceptions\Platform\MessagingMustIncludeSelfInPrivateMessageException($response->getMessage());

			case 400:
				return new Exceptions\Platform\AddSurveyAnswersUnknownSqlException($response->getMessage());

			case 500:
				return new Exceptions\Platform\ForumBodyCannotBeEmptyException($response->getMessage());

			case 501:
				return new Exceptions\Platform\ForumSubjectCannotBeEmptyOnTopicPostException($response->getMessage());

			case 502:
				return new Exceptions\Platform\ForumCannotLocateParentPostException($response->getMessage());

			case 503:
				return new Exceptions\Platform\ForumThreadLockedForRepliesException($response->getMessage());

			case 504:
				return new Exceptions\Platform\ForumUnknownSqlResultDuringCreatePostException($response->getMessage());

			case 505:
				return new Exceptions\Platform\ForumUnknownTagCreationErrorException($response->getMessage());

			case 506:
				return new Exceptions\Platform\ForumUnknownSqlResultDuringTagItemException($response->getMessage());

			case 507:
				return new Exceptions\Platform\ForumUnknownExceptionCreatePostException($response->getMessage());

			case 508:
				return new Exceptions\Platform\ForumQuestionMustBeTopicPostException($response->getMessage());

			case 509:
				return new Exceptions\Platform\ForumExceptionDuringTagSearchException($response->getMessage());

			case 510:
				return new Exceptions\Platform\ForumExceptionDuringTopicRetrievalException($response->getMessage());

			case 511:
				return new Exceptions\Platform\ForumAliasedTagErrorException($response->getMessage());

			case 512:
				return new Exceptions\Platform\ForumCannotLocateThreadException($response->getMessage());

			case 513:
				return new Exceptions\Platform\ForumUnknownExceptionEditPostException($response->getMessage());

			case 514:
				return new Exceptions\Platform\ForumCannotLocatePostException($response->getMessage());

			case 515:
				return new Exceptions\Platform\ForumUnknownExceptionGetOrCreateTagsException($response->getMessage());

			case 516:
				return new Exceptions\Platform\ForumEditPermissionDeniedException($response->getMessage());

			case 517:
				return new Exceptions\Platform\ForumUnknownSqlResultDuringTagIdRetrievalException($response->getMessage());

			case 518:
				return new Exceptions\Platform\ForumCannotGetRatingException($response->getMessage());

			case 519:
				return new Exceptions\Platform\ForumUnknownExceptionGetRatingException($response->getMessage());

			case 520:
				return new Exceptions\Platform\ForumRatingsAccessErrorException($response->getMessage());

			case 521:
				return new Exceptions\Platform\ForumRelatedPostAccessErrorException($response->getMessage());

			case 522:
				return new Exceptions\Platform\ForumLatestReplyAccessErrorException($response->getMessage());

			case 523:
				return new Exceptions\Platform\ForumUserStatusAccessErrorException($response->getMessage());

			case 524:
				return new Exceptions\Platform\ForumAuthorAccessErrorException($response->getMessage());

			case 525:
				return new Exceptions\Platform\ForumGroupAccessErrorException($response->getMessage());

			case 526:
				return new Exceptions\Platform\ForumUrlExpectedButMissingException($response->getMessage());

			case 527:
				return new Exceptions\Platform\ForumRepliesCannotBeEmptyException($response->getMessage());

			case 528:
				return new Exceptions\Platform\ForumRepliesCannotBeInDifferentGroupsException($response->getMessage());

			case 529:
				return new Exceptions\Platform\ForumSubTopicCannotBeCreatedAtThisThreadLevelException($response->getMessage());

			case 530:
				return new Exceptions\Platform\ForumCannotCreateContentTopicException($response->getMessage());

			case 531:
				return new Exceptions\Platform\ForumTopicDoesNotExistException($response->getMessage());

			case 532:
				return new Exceptions\Platform\ForumContentCommentsNotAllowedException($response->getMessage());

			case 533:
				return new Exceptions\Platform\ForumUnknownSqlResultDuringEditPostException($response->getMessage());

			case 534:
				return new Exceptions\Platform\ForumUnknownSqlResultDuringGetPostException($response->getMessage());

			case 535:
				return new Exceptions\Platform\ForumPostValidationBadUrlException($response->getMessage());

			case 536:
				return new Exceptions\Platform\ForumBodyTooLongException($response->getMessage());

			case 537:
				return new Exceptions\Platform\ForumSubjectTooLongException($response->getMessage());

			case 538:
				return new Exceptions\Platform\ForumAnnouncementNotAllowedException($response->getMessage());

			case 539:
				return new Exceptions\Platform\ForumCannotShareOwnPostException($response->getMessage());

			case 540:
				return new Exceptions\Platform\ForumEditNoOpException($response->getMessage());

			case 541:
				return new Exceptions\Platform\ForumUnknownDatabaseErrorDuringGetPostException($response->getMessage());

			case 542:
				return new Exceptions\Platform\ForumExceeedMaximumRowLimitException($response->getMessage());

			case 543:
				return new Exceptions\Platform\ForumCannotSharePrivatePostException($response->getMessage());

			case 544:
				return new Exceptions\Platform\ForumCannotCrossPostBetweenGroupsException($response->getMessage());

			case 555:
				return new Exceptions\Platform\ForumIncompatibleCategoriesException($response->getMessage());

			case 556:
				return new Exceptions\Platform\ForumCannotUseTheseCategoriesOnNonTopicPostException($response->getMessage());

			case 557:
				return new Exceptions\Platform\ForumCanOnlyDeleteTopicsException($response->getMessage());

			case 558:
				return new Exceptions\Platform\ForumDeleteSqlException($response->getMessage());

			case 559:
				return new Exceptions\Platform\ForumDeleteSqlUnknownResultException($response->getMessage());

			case 560:
				return new Exceptions\Platform\ForumTooManyTagsException($response->getMessage());

			case 561:
				return new Exceptions\Platform\ForumCanOnlyRateTopicsException($response->getMessage());

			case 562:
				return new Exceptions\Platform\ForumBannedPostsCannotBeEditedException($response->getMessage());

			case 563:
				return new Exceptions\Platform\ForumThreadRootIsBannedException($response->getMessage());

			case 564:
				return new Exceptions\Platform\ForumCannotUseOfficialTagCategoryAsTagException($response->getMessage());

			case 565:
				return new Exceptions\Platform\ForumAnswerCannotBeMadeOnCreatePostException($response->getMessage());

			case 566:
				return new Exceptions\Platform\ForumAnswerCannotBeMadeOnEditPostException($response->getMessage());

			case 567:
				return new Exceptions\Platform\ForumAnswerPostIdIsNotADirectReplyOfQuestionException($response->getMessage());

			case 568:
				return new Exceptions\Platform\ForumAnswerTopicIdIsNotAQuestionException($response->getMessage());

			case 569:
				return new Exceptions\Platform\ForumUnknownExceptionDuringMarkAnswerException($response->getMessage());

			case 570:
				return new Exceptions\Platform\ForumUnknownSqlResultDuringMarkAnswerException($response->getMessage());

			case 571:
				return new Exceptions\Platform\ForumCannotRateYourOwnPostsException($response->getMessage());

			case 572:
				return new Exceptions\Platform\ForumPollsMustBeTheFirstPostInTopicException($response->getMessage());

			case 573:
				return new Exceptions\Platform\ForumInvalidPollInputException($response->getMessage());

			case 574:
				return new Exceptions\Platform\ForumGroupAdminEditNonMemberException($response->getMessage());

			case 575:
				return new Exceptions\Platform\ForumCannotEditModeratorEditedPostException($response->getMessage());

			case 576:
				return new Exceptions\Platform\ForumRequiresDestinyMembershipException($response->getMessage());

			case 577:
				return new Exceptions\Platform\ForumUnexpectedErrorException($response->getMessage());

			case 601:
				return new Exceptions\Platform\GroupMembershipApplicationAlreadyResolvedException($response->getMessage());

			case 602:
				return new Exceptions\Platform\GroupMembershipAlreadyAppliedException($response->getMessage());

			case 603:
				return new Exceptions\Platform\GroupMembershipInsufficientPrivilegesException($response->getMessage());

			case 604:
				return new Exceptions\Platform\GroupIdNotReturnedFromCreationException($response->getMessage());

			case 605:
				return new Exceptions\Platform\GroupSearchInvalidParametersException($response->getMessage());

			case 606:
				return new Exceptions\Platform\GroupMembershipPendingApplicationNotFoundException($response->getMessage());

			case 607:
				return new Exceptions\Platform\GroupInvalidIdException($response->getMessage());

			case 608:
				return new Exceptions\Platform\GroupInvalidMembershipIdException($response->getMessage());

			case 609:
				return new Exceptions\Platform\GroupInvalidMembershipTypeException($response->getMessage());

			case 610:
				return new Exceptions\Platform\GroupMissingTagsException($response->getMessage());

			case 611:
				return new Exceptions\Platform\GroupMembershipNotFoundException($response->getMessage());

			case 612:
				return new Exceptions\Platform\GroupInvalidRatingException($response->getMessage());

			case 613:
				return new Exceptions\Platform\GroupUserFollowingAccessErrorException($response->getMessage());

			case 614:
				return new Exceptions\Platform\GroupUserMembershipAccessErrorException($response->getMessage());

			case 615:
				return new Exceptions\Platform\GroupCreatorAccessErrorException($response->getMessage());

			case 616:
				return new Exceptions\Platform\GroupAdminAccessErrorException($response->getMessage());

			case 617:
				return new Exceptions\Platform\GroupPrivatePostNotViewableException($response->getMessage());

			case 618:
				return new Exceptions\Platform\GroupMembershipNotLoggedInException($response->getMessage());

			case 619:
				return new Exceptions\Platform\GroupNotDeletedException($response->getMessage());

			case 620:
				return new Exceptions\Platform\GroupUnknownErrorUndeletingGroupException($response->getMessage());

			case 621:
				return new Exceptions\Platform\GroupDeletedException($response->getMessage());

			case 622:
				return new Exceptions\Platform\GroupNotFoundException($response->getMessage());

			case 623:
				return new Exceptions\Platform\GroupMemberBannedException($response->getMessage());

			case 624:
				return new Exceptions\Platform\GroupMembershipClosedException($response->getMessage());

			case 625:
				return new Exceptions\Platform\GroupPrivatePostOverrideErrorException($response->getMessage());

			case 626:
				return new Exceptions\Platform\GroupNameTakenException($response->getMessage());

			case 627:
				return new Exceptions\Platform\GroupDeletionGracePeriodExpiredException($response->getMessage());

			case 628:
				return new Exceptions\Platform\GroupCannotCheckBanStatusException($response->getMessage());

			case 629:
				return new Exceptions\Platform\GroupMaximumMembershipCountReachedException($response->getMessage());

			case 630:
				return new Exceptions\Platform\NoDestinyAccountForClanPlatformException($response->getMessage());

			case 631:
				return new Exceptions\Platform\AlreadyRequestingMembershipForClanPlatformException($response->getMessage());

			case 632:
				return new Exceptions\Platform\AlreadyClanMemberOnPlatformException($response->getMessage());

			case 633:
				return new Exceptions\Platform\GroupJoinedCannotSetClanNameException($response->getMessage());

			case 634:
				return new Exceptions\Platform\GroupLeftCannotClearClanNameException($response->getMessage());

			case 635:
				return new Exceptions\Platform\GroupRelationshipRequestPendingException($response->getMessage());

			case 636:
				return new Exceptions\Platform\GroupRelationshipRequestBlockedException($response->getMessage());

			case 637:
				return new Exceptions\Platform\GroupRelationshipRequestNotFoundException($response->getMessage());

			case 638:
				return new Exceptions\Platform\GroupRelationshipBlockNotFoundException($response->getMessage());

			case 639:
				return new Exceptions\Platform\GroupRelationshipNotFoundException($response->getMessage());

			case 641:
				return new Exceptions\Platform\GroupAlreadyAlliedException($response->getMessage());

			case 642:
				return new Exceptions\Platform\GroupAlreadyMemberException($response->getMessage());

			case 643:
				return new Exceptions\Platform\GroupRelationshipAlreadyExistsException($response->getMessage());

			case 644:
				return new Exceptions\Platform\InvalidGroupTypesForRelationshipRequestException($response->getMessage());

			case 646:
				return new Exceptions\Platform\GroupAtMaximumAlliancesException($response->getMessage());

			case 647:
				return new Exceptions\Platform\GroupCannotSetClanOnlySettingsException($response->getMessage());

			case 648:
				return new Exceptions\Platform\ClanCannotSetTwoDefaultPostTypesException($response->getMessage());

			case 649:
				return new Exceptions\Platform\GroupMemberInvalidMemberTypeException($response->getMessage());

			case 650:
				return new Exceptions\Platform\GroupInvalidPlatformTypeException($response->getMessage());

			case 651:
				return new Exceptions\Platform\GroupMemberInvalidSortException($response->getMessage());

			case 652:
				return new Exceptions\Platform\GroupInvalidResolveStateException($response->getMessage());

			case 653:
				return new Exceptions\Platform\ClanAlreadyEnabledForPlatformException($response->getMessage());

			case 654:
				return new Exceptions\Platform\ClanNotEnabledForPlatformException($response->getMessage());

			case 655:
				return new Exceptions\Platform\ClanEnabledButCouldNotJoinNoAccountException($response->getMessage());

			case 656:
				return new Exceptions\Platform\ClanEnabledButCouldNotJoinAlreadyMemberException($response->getMessage());

			case 657:
				return new Exceptions\Platform\ClanCannotJoinNoCredentialException($response->getMessage());

			case 658:
				return new Exceptions\Platform\NoClanMembershipForPlatformException($response->getMessage());

			case 659:
				return new Exceptions\Platform\GroupToGroupFollowLimitReachedException($response->getMessage());

			case 660:
				return new Exceptions\Platform\ChildGroupAlreadyInAllianceException($response->getMessage());

			case 661:
				return new Exceptions\Platform\OwnerGroupAlreadyInAllianceException($response->getMessage());

			case 662:
				return new Exceptions\Platform\AllianceOwnerCannotJoinAllianceException($response->getMessage());

			case 663:
				return new Exceptions\Platform\GroupNotInAllianceException($response->getMessage());

			case 664:
				return new Exceptions\Platform\ChildGroupCannotInviteToAllianceException($response->getMessage());

			case 665:
				return new Exceptions\Platform\GroupToGroupAlreadyFollowedException($response->getMessage());

			case 666:
				return new Exceptions\Platform\GroupToGroupNotFollowingException($response->getMessage());

			case 667:
				return new Exceptions\Platform\ClanMaximumMembershipReachedException($response->getMessage());

			case 668:
				return new Exceptions\Platform\ClanNameNotValidException($response->getMessage());

			case 669:
				return new Exceptions\Platform\ClanNameNotValidErrorException($response->getMessage());

			case 670:
				return new Exceptions\Platform\AllianceOwnerNotDefinedException($response->getMessage());

			case 671:
				return new Exceptions\Platform\AllianceChildNotDefinedException($response->getMessage());

			case 672:
				return new Exceptions\Platform\ClanNameIllegalCharactersException($response->getMessage());

			case 673:
				return new Exceptions\Platform\ClanTagIllegalCharactersException($response->getMessage());

			case 674:
				return new Exceptions\Platform\ClanRequiresInvitationException($response->getMessage());

			case 701:
				return new Exceptions\Platform\ActivitiesUnknownException($response->getMessage());

			case 702:
				return new Exceptions\Platform\ActivitiesParameterNullException($response->getMessage());

			case 703:
				return new Exceptions\Platform\ActivityCountsDiabledException($response->getMessage());

			case 704:
				return new Exceptions\Platform\ActivitySearchInvalidParametersException($response->getMessage());

			case 705:
				return new Exceptions\Platform\ActivityPermissionDeniedException($response->getMessage());

			case 706:
				return new Exceptions\Platform\ShareAlreadySharedException($response->getMessage());

			case 707:
				return new Exceptions\Platform\ActivityLoggingDisabledException($response->getMessage());

			case 801:
				return new Exceptions\Platform\ItemAlreadyFollowedException($response->getMessage());

			case 802:
				return new Exceptions\Platform\ItemNotFollowedException($response->getMessage());

			case 803:
				return new Exceptions\Platform\CannotFollowSelfException($response->getMessage());

			case 804:
				return new Exceptions\Platform\GroupFollowLimitExceededException($response->getMessage());

			case 805:
				return new Exceptions\Platform\TagFollowLimitExceededException($response->getMessage());

			case 806:
				return new Exceptions\Platform\UserFollowLimitExceededException($response->getMessage());

			case 807:
				return new Exceptions\Platform\FollowUnsupportedEntityTypeException($response->getMessage());

			case 900:
				return new Exceptions\Platform\NoValidTagsInListException($response->getMessage());

			case 901:
				return new Exceptions\Platform\BelowMinimumSuggestionLengthException($response->getMessage());

			case 902:
				return new Exceptions\Platform\CannotGetSuggestionsOnMultipleTagsSimultaneouslyException($response->getMessage());

			case 903:
				return new Exceptions\Platform\NotAValidPartialTagException($response->getMessage());

			case 904:
				return new Exceptions\Platform\TagSuggestionsUnknownSqlResultException($response->getMessage());

			case 905:
				return new Exceptions\Platform\TagsUnableToLoadPopularTagsFromDatabaseException($response->getMessage());

			case 906:
				return new Exceptions\Platform\TagInvalidException($response->getMessage());

			case 907:
				return new Exceptions\Platform\TagNotFoundException($response->getMessage());

			case 908:
				return new Exceptions\Platform\SingleTagExpectedException($response->getMessage());

			case 1000:
				return new Exceptions\Platform\IgnoreInvalidParametersException($response->getMessage());

			case 1001:
				return new Exceptions\Platform\IgnoreSqlException($response->getMessage());

			case 1002:
				return new Exceptions\Platform\IgnoreErrorRetrievingGroupPermissionsException($response->getMessage());

			case 1003:
				return new Exceptions\Platform\IgnoreErrorInsufficientPermissionException($response->getMessage());

			case 1004:
				return new Exceptions\Platform\IgnoreErrorRetrievingItemException($response->getMessage());

			case 1005:
				return new Exceptions\Platform\IgnoreCannotIgnoreSelfException($response->getMessage());

			case 1006:
				return new Exceptions\Platform\IgnoreIllegalTypeException($response->getMessage());

			case 1007:
				return new Exceptions\Platform\IgnoreNotFoundException($response->getMessage());

			case 1008:
				return new Exceptions\Platform\IgnoreUserGloballyIgnoredException($response->getMessage());

			case 1009:
				return new Exceptions\Platform\IgnoreUserIgnoredException($response->getMessage());

			case 1100:
				return new Exceptions\Platform\NotificationSettingInvalidException($response->getMessage());

			case 1204:
				return new Exceptions\Platform\PSNExExpiredTicketException($response->getMessage());

			case 1205:
				return new Exceptions\Platform\PSNExForbiddenException($response->getMessage());

			case 1218:
				return new Exceptions\Platform\PSNExSystemDisabledException($response->getMessage());

			case 1219:
				return new Exceptions\Platform\PSNFriendsMissingTicketException($response->getMessage());

			case 1223:
				return new Exceptions\Platform\PsnApiErrorCodeUnknownException($response->getMessage());

			case 1224:
				return new Exceptions\Platform\PsnApiErrorWebException($response->getMessage());

			case 1225:
				return new Exceptions\Platform\PsnApiBadRequestException($response->getMessage());

			case 1226:
				return new Exceptions\Platform\PsnApiAccessTokenRequiredException($response->getMessage());

			case 1227:
				return new Exceptions\Platform\PsnApiInvalidAccessTokenException($response->getMessage());

			case 1228:
				return new Exceptions\Platform\PsnApiExpiredAccessTokenException($response->getMessage());

			case 1229:
				return new Exceptions\Platform\PsnApiBannedUserException($response->getMessage());

			case 1230:
				return new Exceptions\Platform\PsnApiAccountUpgradeRequiredException($response->getMessage());

			case 1231:
				return new Exceptions\Platform\PsnApiServiceTemporarilyUnavailableException($response->getMessage());

			case 1232:
				return new Exceptions\Platform\PsnApiServerBusyException($response->getMessage());

			case 1233:
				return new Exceptions\Platform\PsnApiUnderMaintenanceException($response->getMessage());

			case 1234:
				return new Exceptions\Platform\PsnApiProfileUserNotFoundException($response->getMessage());

			case 1235:
				return new Exceptions\Platform\PsnApiProfilePrivacyRestrictionException($response->getMessage());

			case 1236:
				return new Exceptions\Platform\PsnApiProfileUnderMaintenanceException($response->getMessage());

			case 1237:
				return new Exceptions\Platform\PsnApiAccountAttributeMissingException($response->getMessage());

			case 1300:
				return new Exceptions\Platform\XblExSystemDisabledException($response->getMessage());

			case 1301:
				return new Exceptions\Platform\XblExUnknownErrorException($response->getMessage());

			case 1400:
				return new Exceptions\Platform\ReportNotYetResolvedException($response->getMessage());

			case 1401:
				return new Exceptions\Platform\ReportOverturnDoesNotChangeDecisionException($response->getMessage());

			case 1402:
				return new Exceptions\Platform\ReportNotFoundException($response->getMessage());

			case 1403:
				return new Exceptions\Platform\ReportAlreadyReportedException($response->getMessage());

			case 1404:
				return new Exceptions\Platform\ReportInvalidResolutionException($response->getMessage());

			case 1500:
				return new Exceptions\Platform\LegacyGameStatsSystemDisabledException($response->getMessage());

			case 1501:
				return new Exceptions\Platform\LegacyGameStatsUnknownErrorException($response->getMessage());

			case 1502:
				return new Exceptions\Platform\LegacyGameStatsMalformedSneakerNetCodeException($response->getMessage());

			case 1600:
				return new Exceptions\Platform\DestinyAccountAcquisitionFailureException($response->getMessage());

			case 1601:
				return new Exceptions\Platform\DestinyAccountNotFoundException($response->getMessage());

			case 1602:
				return new Exceptions\Platform\DestinyBuildStatsDatabaseErrorException($response->getMessage());

			case 1603:
				return new Exceptions\Platform\DestinyCharacterStatsDatabaseErrorException($response->getMessage());

			case 1604:
				return new Exceptions\Platform\DestinyPvPStatsDatabaseErrorException($response->getMessage());

			case 1605:
				return new Exceptions\Platform\DestinyPvEStatsDatabaseErrorException($response->getMessage());

			case 1606:
				return new Exceptions\Platform\DestinyGrimoireStatsDatabaseErrorException($response->getMessage());

			case 1607:
				return new Exceptions\Platform\DestinyStatsParameterMembershipTypeParseErrorException($response->getMessage());

			case 1608:
				return new Exceptions\Platform\DestinyStatsParameterMembershipIdParseErrorException($response->getMessage());

			case 1609:
				return new Exceptions\Platform\DestinyStatsParameterRangeParseErrorException($response->getMessage());

			case 1610:
				return new Exceptions\Platform\DestinyStringItemHashNotFoundException($response->getMessage());

			case 1611:
				return new Exceptions\Platform\DestinyStringSetNotFoundException($response->getMessage());

			case 1612:
				return new Exceptions\Platform\DestinyContentLookupNotFoundForKeyException($response->getMessage());

			case 1613:
				return new Exceptions\Platform\DestinyContentItemNotFoundException($response->getMessage());

			case 1614:
				return new Exceptions\Platform\DestinyContentSectionNotFoundException($response->getMessage());

			case 1615:
				return new Exceptions\Platform\DestinyContentPropertyNotFoundException($response->getMessage());

			case 1616:
				return new Exceptions\Platform\DestinyContentConfigNotFoundException($response->getMessage());

			case 1617:
				return new Exceptions\Platform\DestinyContentPropertyBucketValueNotFoundException($response->getMessage());

			case 1618:
				return new Exceptions\Platform\DestinyUnexpectedErrorException($response->getMessage());

			case 1619:
				return new Exceptions\Platform\DestinyInvalidActionException($response->getMessage());

			case 1620:
				return new Exceptions\Platform\DestinyCharacterNotFoundException($response->getMessage());

			case 1621:
				return new Exceptions\Platform\DestinyInvalidFlagException($response->getMessage());

			case 1622:
				return new Exceptions\Platform\DestinyInvalidRequestException($response->getMessage());

			case 1623:
				return new Exceptions\Platform\DestinyItemNotFoundException($response->getMessage());

			case 1624:
				return new Exceptions\Platform\DestinyInvalidCustomizationChoicesException($response->getMessage());

			case 1625:
				return new Exceptions\Platform\DestinyVendorItemNotFoundException($response->getMessage());

			case 1626:
				return new Exceptions\Platform\DestinyInternalErrorException($response->getMessage());

			case 1627:
				return new Exceptions\Platform\DestinyVendorNotFoundException($response->getMessage());

			case 1628:
				return new Exceptions\Platform\DestinyRecentActivitiesDatabaseErrorException($response->getMessage());

			case 1629:
				return new Exceptions\Platform\DestinyItemBucketNotFoundException($response->getMessage());

			case 1630:
				return new Exceptions\Platform\DestinyInvalidMembershipTypeException($response->getMessage());

			case 1631:
				return new Exceptions\Platform\DestinyVersionIncompatibilityException($response->getMessage());

			case 1632:
				return new Exceptions\Platform\DestinyItemAlreadyInInventoryException($response->getMessage());

			case 1633:
				return new Exceptions\Platform\DestinyBucketNotFoundException($response->getMessage());

			case 1634:
				return new Exceptions\Platform\DestinyCharacterNotInTowerException($response->getMessage());

			case 1635:
				return new Exceptions\Platform\DestinyCharacterNotLoggedInException($response->getMessage());

			case 1636:
				return new Exceptions\Platform\DestinyDefinitionsNotLoadedException($response->getMessage());

			case 1637:
				return new Exceptions\Platform\DestinyInventoryFullException($response->getMessage());

			case 1638:
				return new Exceptions\Platform\DestinyItemFailedLevelCheckException($response->getMessage());

			case 1639:
				return new Exceptions\Platform\DestinyItemFailedUnlockCheckException($response->getMessage());

			case 1640:
				return new Exceptions\Platform\DestinyItemUnequippableException($response->getMessage());

			case 1641:
				return new Exceptions\Platform\DestinyItemUniqueEquipRestrictedException($response->getMessage());

			case 1642:
				return new Exceptions\Platform\DestinyNoRoomInDestinationException($response->getMessage());

			case 1643:
				return new Exceptions\Platform\DestinyServiceFailureException($response->getMessage());

			case 1644:
				return new Exceptions\Platform\DestinyServiceRetiredException($response->getMessage());

			case 1645:
				return new Exceptions\Platform\DestinyTransferFailedException($response->getMessage());

			case 1646:
				return new Exceptions\Platform\DestinyTransferNotFoundForSourceBucketException($response->getMessage());

			case 1647:
				return new Exceptions\Platform\DestinyUnexpectedResultInVendorTransferCheckException($response->getMessage());

			case 1648:
				return new Exceptions\Platform\DestinyUniquenessViolationException($response->getMessage());

			case 1649:
				return new Exceptions\Platform\DestinyErrorDeserializationFailureException($response->getMessage());

			case 1650:
				return new Exceptions\Platform\DestinyValidAccountTicketRequiredException($response->getMessage());

			case 1651:
				return new Exceptions\Platform\DestinyShardRelayClientTimeoutException($response->getMessage());

			case 1652:
				return new Exceptions\Platform\DestinyShardRelayProxyTimeoutException($response->getMessage());

			case 1800:
				return new Exceptions\Platform\FbInvalidRequestException($response->getMessage());

			case 1801:
				return new Exceptions\Platform\FbRedirectMismatchException($response->getMessage());

			case 1802:
				return new Exceptions\Platform\FbAccessDeniedException($response->getMessage());

			case 1803:
				return new Exceptions\Platform\FbUnsupportedResponseTypeException($response->getMessage());

			case 1804:
				return new Exceptions\Platform\FbInvalidScopeException($response->getMessage());

			case 1805:
				return new Exceptions\Platform\FbUnsupportedGrantTypeException($response->getMessage());

			case 1806:
				return new Exceptions\Platform\FbInvalidGrantException($response->getMessage());

			case 1900:
				return new Exceptions\Platform\InvitationExpiredException($response->getMessage());

			case 1901:
				return new Exceptions\Platform\InvitationUnknownTypeException($response->getMessage());

			case 1902:
				return new Exceptions\Platform\InvitationInvalidResponseStatusException($response->getMessage());

			case 1903:
				return new Exceptions\Platform\InvitationInvalidTypeException($response->getMessage());

			case 1904:
				return new Exceptions\Platform\InvitationAlreadyPendingException($response->getMessage());

			case 1905:
				return new Exceptions\Platform\InvitationInsufficientPermissionException($response->getMessage());

			case 1906:
				return new Exceptions\Platform\InvitationInvalidCodeException($response->getMessage());

			case 1907:
				return new Exceptions\Platform\InvitationInvalidTargetStateException($response->getMessage());

			case 1908:
				return new Exceptions\Platform\InvitationCannotBeReactivatedException($response->getMessage());

			case 1909:
				return new Exceptions\Platform\InvitationAutoApprovedException($response->getMessage());

			case 1910:
				return new Exceptions\Platform\InvitationNoRecipientsException($response->getMessage());

			case 1911:
				return new Exceptions\Platform\InvitationGroupCannotSendToSelfException($response->getMessage());

			case 1912:
				return new Exceptions\Platform\InvitationTooManyRecipientsException($response->getMessage());

			case 1913:
				return new Exceptions\Platform\InvitationInvalidException($response->getMessage());

			case 1914:
				return new Exceptions\Platform\InvitationNotFoundException($response->getMessage());

			case 2000:
				return new Exceptions\Platform\TokenInvalidException($response->getMessage());

			case 2001:
				return new Exceptions\Platform\TokenBadFormatException($response->getMessage());

			case 2002:
				return new Exceptions\Platform\TokenAlreadyClaimedException($response->getMessage());

			case 2003:
				return new Exceptions\Platform\TokenAlreadyClaimedSelfException($response->getMessage());

			case 2004:
				return new Exceptions\Platform\TokenThrottlingException($response->getMessage());

			case 2005:
				return new Exceptions\Platform\TokenUnknownRedemptionFailureException($response->getMessage());

			case 2006:
				return new Exceptions\Platform\TokenPurchaseClaimFailedAfterTokenClaimedException($response->getMessage());

			case 2007:
				return new Exceptions\Platform\TokenUserAlreadyOwnsOfferException($response->getMessage());

			case 2008:
				return new Exceptions\Platform\TokenInvalidOfferKeyException($response->getMessage());

			case 2009:
				return new Exceptions\Platform\TokenEmailNotValidatedException($response->getMessage());

			case 2010:
				return new Exceptions\Platform\TokenProvisioningBadVendorOrOfferException($response->getMessage());

			case 2011:
				return new Exceptions\Platform\TokenPurchaseHistoryUnknownErrorException($response->getMessage());

			case 2012:
				return new Exceptions\Platform\TokenThrottleStateUnknownErrorException($response->getMessage());

			case 2013:
				return new Exceptions\Platform\TokenUserAgeNotVerifiedException($response->getMessage());

			case 2014:
				return new Exceptions\Platform\TokenExceededOfferMaximumException($response->getMessage());

			case 2015:
				return new Exceptions\Platform\TokenNoAvailableUnlocksException($response->getMessage());

			case 2016:
				return new Exceptions\Platform\TokenMarketplaceInvalidPlatformException($response->getMessage());

			case 2017:
				return new Exceptions\Platform\TokenNoMarketplaceCodesFoundException($response->getMessage());

			case 2018:
				return new Exceptions\Platform\TokenOfferNotAvailableForRedemptionException($response->getMessage());

			case 2019:
				return new Exceptions\Platform\TokenUnlockPartialFailureException($response->getMessage());

			case 2020:
				return new Exceptions\Platform\TokenMarketplaceInvalidRegionException($response->getMessage());

			case 2021:
				return new Exceptions\Platform\TokenOfferExpiredException($response->getMessage());

			default:
				return new UnknownErrorResponseException(
						$response->getMessage(),
						$response->getErrorCode());
			
		}
		
	}
	
}